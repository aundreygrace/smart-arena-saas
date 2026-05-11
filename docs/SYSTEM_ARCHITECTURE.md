# 7. SYSTEM ARCHITECTURE

## Backend Architecture

The backend follows clean architecture principles.

Flow:
Controller
→ Service
→ Repository
→ Database

---

## Architecture Principles

* Thin controllers
* Business logic inside services
* Validation using FormRequest
* Enum-based statuses
* Repository abstraction for queries
* Modular structure
* Scalable folder organization

---

## Backend Stack

* Laravel 12
* PostgreSQL
* Spatie Permission
* Laravel Breeze
* Inertia.js

---

## Frontend Architecture

The frontend uses React with Inertia.js.

Structure:

* Pages
* Components
* Layouts
* Hooks
* Services

---

## Frontend Stack

* React
* Inertia.js
* TailwindCSS
* ApexCharts

---

# 16. PROJECT STRUCTURE

## Root Structure

smart-arena-saas/
│
├── backend/
├── frontend/
├── docs/
├── assets/
├── README.md
└── .gitignore

---

## Backend Structure

app/
│
├── Actions/
├── DTOs/
├── Enums/
├── Helpers/
├── Http/
├── Interfaces/
├── Models/
├── Repositories/
├── Services/
└── Traits/

---

## Frontend Structure

resources/js/
│
├── Components/
├── Hooks/
├── Layouts/
├── Pages/
└── Services/

---


# Queue Architecture

The system uses asynchronous queues for scalability.

---

## Queue Channels

### bookings

High priority queue.

Used for:
- booking expiration
- booking synchronization
- payment validation

---

### notifications

Medium priority queue.

Used for:
- email notifications
- booking reminders
- owner updates

---

### analytics

Low priority queue.

Used for:
- analytics snapshots
- reporting jobs
- aggregation tasks

---

# Queue Principles

## Requirements

- asynchronous processing
- retry support
- failure handling
- duplicate prevention

---

# Locking Strategy

The booking system uses layered concurrency protection.

## Layer 1 — Service Validation

Validate slot availability before insert.

---

## Layer 2 — Pessimistic Locking

Use lockForUpdate() during booking transaction.

---

## Layer 3 — Database Constraints

Use UNIQUE constraints as final protection.

---

## Layer 4 — Redis Distributed Lock

Planned for future high traffic scalability.

---

# Analytics Architecture

Dashboard analytics must be optimized for performance.

## Recommended Strategy

- analytics snapshots
- denormalized counters
- async aggregation jobs

Avoid:
- realtime heavy aggregate queries
- complex joins inside dashboard requests

---

# Storage Architecture

## Public Storage

Stores:
- arena images
- public assets

---

## Private Storage

Stores:
- KTP documents
- selfie verification
- sensitive owner files

---

# Payment Architecture

Payment processing must support:
- idempotency
- webhook synchronization
- audit logging
- retry safety

---

# Booking Architecture

Booking system must support:
- atomic transactions
- expiration jobs
- concurrency protection
- scalable queue handling