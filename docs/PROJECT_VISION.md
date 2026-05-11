# Smart Arena Booking SaaS

## Production-Grade Project Documentation

---

# 1. PROJECT OVERVIEW

## Project Name

Smart Arena Booking SaaS

---

## Project Description

Smart Arena Booking SaaS is a modern sports venue booking platform designed to connect users with sports venue owners through a scalable and professional booking ecosystem.

The platform focuses on:

* realtime-ready booking architecture,
* modern SaaS dashboard experience,
* scalable backend structure,
* professional role management,
* analytics-driven management,
* AI-based recommendation system.

The application is built as a production-grade portfolio project to simulate real-world startup architecture and engineering workflow.

---

## Main Goals

### Business Goals

* Help users easily discover and book sports venues.
* Help venue owners manage arenas and bookings digitally.
* Generate platform revenue using admin/platform fees.
* Provide modern analytics for venue owners.

---

### Engineering Goals

* Build scalable Laravel architecture.
* Implement clean and maintainable code structure.
* Apply professional software engineering workflow.
* Simulate real SaaS application development.
* Prepare portfolio project suitable for junior fullstack developer applications.

---

# 2. BUSINESS MODEL

## Revenue Model

The platform generates revenue using a platform/admin fee system.

Example:

Arena Price: Rp100.000
Platform Fee: Rp5.000
User Total Payment: Rp105.000
Owner Revenue: Rp100.000
Platform Revenue: Rp5.000

---

## Why Platform Fee Model?

* Easier onboarding for venue owners.
* More realistic marketplace business model.
* Scalable revenue system.
* Similar to Traveloka, Airbnb, and booking marketplaces.

---

# 3. TARGET USERS

## Primary Users

### General Users

People searching for sports venues.

Examples:

* futsal players
* badminton communities
* basketball communities
* casual users

---

### Venue Owners

Sports venue owners who want to:

* manage schedules,
* manage bookings,
* monitor revenue,
* view analytics.

---

### Platform Administrators

Administrators responsible for:

* managing platform operations,
* verifying owners,
* monitoring transactions,
* managing platform revenue.

---

# 4. USER ROLES

## 1. User

Capabilities:

* Register and login.
* Search arenas.
* View arena details.
* Book arenas.
* Make payments.
* Leave reviews.
* Save favorite arenas.

---

## 2. Venue Owner

Capabilities:

* Create and manage arenas.
* Manage schedules.
* Monitor bookings.
* View analytics dashboard.
* Upload arena images.
* Manage pricing.

Restrictions:

* Must pass owner verification.
* Cannot access admin features.

---

## 3. Admin

Capabilities:

* Verify venue owners.
* Manage platform settings.
* Monitor transactions.
* Manage users.
* View platform analytics.
* Suspend users or arenas.

---

# 5. CORE FEATURES

## Authentication System

* Register with email and password
* Continue with Google OAuth
* Optional GitHub OAuth
* Login and logout system
* Remember session
* Forgot password
* Email verification
* Secure session management
* Role-based authentication
* Owner application workflow

---

## Authentication Flow

### User Registration

Users can:

* continue with Google,
* register manually using email and password.

Default registered users always receive the `user` role.

---

### Owner Application Flow

Users cannot directly register as venue owners.

Flow:
User Register
→ Apply as Venue Owner
→ Upload Verification Documents
→ Admin Review
→ Owner Approved

This approach follows modern marketplace platform standards.

---

### Admin Access Rules

* Admin accounts are not publicly registerable.
* Admins are created internally.
* Admin authentication is restricted and protected.

---

### Email Verification Rules

Users must verify their email before:

* booking arenas,
* making payments,
* submitting reviews.

---

### Planned Security Features

* OAuth authentication
* CSRF protection
* Password hashing
* Session protection
* Optional 2FA for future scalability

---

## Arena Management

* Create arena
* Edit arena
* Delete arena
* Upload arena images
* Manage schedules
* Set operating hours
* Set pricing

---

## Booking System

* Realtime-ready booking flow
* Slot-based booking
* Booking validation
* Prevent double booking
* Booking expiration
* Booking status management

---

## Payment System

* Midtrans integration
* Payment status tracking
* Platform fee calculation
* Transaction history
* Revenue tracking

---

## Analytics Dashboard

### Owner Dashboard

* Total bookings
* Revenue graph
* Popular arenas
* Booking statistics

### Admin Dashboard

* Platform revenue
* Active owners
* Total transactions
* Pending verifications

---

## AI Recommendation

* Popular arena recommendation
* Personalized recommendations
* Price-based recommendation
* Location-based recommendation

---

## Review System

* Rating system
* User reviews
* Average rating calculation

---

## Notification System

* Booking confirmation
* Payment success
* Booking reminder
* Verification updates

---