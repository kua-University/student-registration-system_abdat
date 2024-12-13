package com.example.grade_service.service;

import com.example.grade_service.model.Grade;
import com.example.grade_service.repository.GradeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class GradeService {
    @Autowired
    private GradeRepository gradeRepository;

    public List<Grade> getAllGrades() {
        return gradeRepository.findAll();
    }

    public List<Grade> getGradesByStudentId(Long studentId) {
        return gradeRepository.findByStudentId(studentId);
    }

    public List<Grade> getGradesByCourseId(Long courseId) {
        return gradeRepository.findByCourseId(courseId);
    }

    public Grade addGrade(Grade grade) {
        return gradeRepository.save(grade);
    }

    public Grade updateGrade(Long id, Grade grade) {
        Grade existingGrade = gradeRepository.findById(id).orElseThrow();
        existingGrade.setStudentId(grade.getStudentId());
        existingGrade.setCourseId(grade.getCourseId());
        existingGrade.setGrade(grade.getGrade());
        return gradeRepository.save(existingGrade);
    }

    public void deleteGrade(Long id) {
        gradeRepository.deleteById(id);
    }
}
