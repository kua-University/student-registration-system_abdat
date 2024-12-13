# Microservice Architecture Project

## Project Overview
This project demonstrates a **Microservice Architecture** setup consisting of a backend, frontend, and database. It showcases a modular approach where each service operates independently, yet communicates through an **API Gateway**. The project’s backend microservices include Course, Enrollment, User, and Grade services, each handling specific aspects of the application’s domain logic. A **Eureka Service Registry** manages service discovery, enabling scalability and independence for each microservice.

## Folder Structure

### [backend/](backend/)
- [api-gateway/](backend/api-gateway/)
- [course-service/](backend/course-service/)
- [enrollment-service/](backend/enrollment-service/)
- [eureka-service/](backend/eureka-service/)
- [grade-service/](backend/grade-service/)
- [user-service/](backend/user-service/)
### [frontend/](frontend/)
- [Frontend Code/](frontend/)
### [database/](database/)
- [course_service_db.sql](database/course_service_db.sql)
- [enrollment_service_db.sql](database/enrollment_service_db.sql)
- [grade_service_db.sql](database/grade_service_db.sql)
- [user_service_db.sql](database/user_service_db.sql)

## Key Technologies Used
- **Spring Boot**: Framework for backend microservices.
- **Eureka**: Service discovery for managing microservices.
- **Javascript/HTML/CSS**: Frontend user interface
- **MySQL**: Database for persistent data storage.

## Microservices Explained

1. **api-gateway**: Routes requests to the respective services and handles load balancing.
2. **course-service**: Manages data related to courses.
3. **enrollment-service**: Handles course enrollment processes.
4. **eureka-service**: Service registry to help microservices locate each other.
5. **grade-service**: Manages student grade for a given course.
6. **user-service**: Manages user information and authentication.

---

**Submitted by**: Abdelaziz Yassin Ibrahim
**ID**: chs/ur175850/12
