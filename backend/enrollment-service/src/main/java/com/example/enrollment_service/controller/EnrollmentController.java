package com.example.enrollment_service.controller;

import com.example.enrollment_service.model.Enrollment;
import com.example.enrollment_service.service.EnrollmentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/enrollments")
public class EnrollmentController {
    @Autowired
    private EnrollmentService enrollmentService;

    @GetMapping
    public ResponseEntity<List<Enrollment>> getAllEnrollments() {
        List<Enrollment> enrollments = enrollmentService.getAllEnrollments();
        return ResponseEntity.ok(enrollments);
    }

    @GetMapping("/{id}")
    public ResponseEntity<Enrollment> getEnrollmentById(@PathVariable Long id) {
        Enrollment enrollment = enrollmentService.getEnrollmentById(id);
        if (enrollment != null) {
            return ResponseEntity.ok(enrollment);
        }
        return ResponseEntity.status(404).body(null);
    }

    @GetMapping("/course/{id}")
    public ResponseEntity<List<Enrollment>> getEnrollmentsByCourseId(@PathVariable Long id) {
        List<Enrollment> enrollments = enrollmentService.getEnrollmentByCourseId(id);
        return ResponseEntity.ok(enrollments);
    }

    @GetMapping("/student/{id}")
    public ResponseEntity<List<Enrollment>> getEnrollmentsByStudentId(@PathVariable Long id) {
        List<Enrollment> enrollments = enrollmentService.getEnrollmentByStudentId(id);
        return ResponseEntity.ok(enrollments);
    }

    @PostMapping("/add")
    public ResponseEntity<Enrollment> addEnrollment(@RequestBody Enrollment enrollment) {
        Enrollment createdEnrollment = enrollmentService.addEnrollment(enrollment);
        return ResponseEntity.ok(createdEnrollment);
    }

    @PostMapping("/approve/{id}")
    public ResponseEntity<?> approveEnrollment(@PathVariable Long id) {
        Enrollment enrollment = enrollmentService.approveEnrollment(id);
        if (enrollment != null) {
            return ResponseEntity.ok("Enrollment approved");
        }
        return ResponseEntity.status(404).body("Enrollment not found");
    }

    @PostMapping("/reject/{id}")
    public ResponseEntity<?> rejectEnrollment(@PathVariable Long id) {
        Enrollment enrollment = enrollmentService.rejectEnrollment(id);
        if (enrollment != null) {
            return ResponseEntity.ok("Enrollment rejected");
        }
        return ResponseEntity.status(404).body("Enrollment not found");
    }
}