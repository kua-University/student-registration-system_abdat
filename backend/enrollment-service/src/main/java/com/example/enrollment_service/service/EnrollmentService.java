package com.example.enrollment_service.service;

import com.example.enrollment_service.model.Enrollment;
import com.example.enrollment_service.model.Enrollment.Status;
import com.example.enrollment_service.repository.EnrollmentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class EnrollmentService {

    @Autowired
    private EnrollmentRepository enrollmentRepository;

    public List<Enrollment> getAllEnrollments() {
        return enrollmentRepository.findAll();
    }

    public Enrollment getEnrollmentById(Long id) {
        return enrollmentRepository.findById(id).orElse(null);
    }

    public List<Enrollment> getEnrollmentByCourseId(Long id) {
        return enrollmentRepository.findByCourseId(id);
    }

    public List<Enrollment> getEnrollmentByStudentId(Long id) {
        return enrollmentRepository.findByStudentId(id);
    }

    public Enrollment addEnrollment(Enrollment enrollment) {
        enrollment.setStatus(Status.PENDING);
        return enrollmentRepository.save(enrollment);
    }

    public Enrollment approveEnrollment(Long id) {
        Enrollment enrollment = enrollmentRepository.findById(id).orElse(null);
        if (enrollment != null) {
            enrollment.setStatus(Status.APPROVED);
            enrollmentRepository.save(enrollment);
        }
        return enrollment;
    }

    public Enrollment rejectEnrollment(Long id) {
        Enrollment enrollment = enrollmentRepository.findById(id).orElse(null);
        if (enrollment != null) {
            enrollment.setStatus(Status.REJECTED);
            enrollmentRepository.save(enrollment);
        }
        return enrollment;
    }
}
