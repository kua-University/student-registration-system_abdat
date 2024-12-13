package com.example.grade_service.controller;

import com.example.grade_service.model.Grade;
import com.example.grade_service.service.GradeService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/grades")
public class GradeController {
    @Autowired
    private GradeService gradeService;

    @GetMapping
    public ResponseEntity<List<Grade>> getAllGrades() {
        List<Grade> grades = gradeService.getAllGrades();
        return ResponseEntity.ok(grades);
    }

    @GetMapping("/student/{id}")
    public ResponseEntity<List<Grade>> getGradesByStudentId(@PathVariable Long id) {
        List<Grade> grades = gradeService.getGradesByStudentId(id);
        return ResponseEntity.ok(grades);
    }

    @GetMapping("/course/{id}")
    public ResponseEntity<List<Grade>> getGradesByCourseId(@PathVariable Long id) {
        List<Grade> grades = gradeService.getGradesByCourseId(id);
        return ResponseEntity.ok(grades);
    }

    @PostMapping
    public ResponseEntity<Grade> addGrade(@RequestBody Grade grade) {
        Grade createdGrade = gradeService.addGrade(grade);
        return ResponseEntity.ok(createdGrade);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Grade> updateGrade(@PathVariable Long id, @RequestBody Grade grade) {
        Grade updatedGrade = gradeService.updateGrade(id, grade);
        return ResponseEntity.ok(updatedGrade);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteGrade(@PathVariable Long id) {
        gradeService.deleteGrade(id);
        return ResponseEntity.ok().build();
    }
}