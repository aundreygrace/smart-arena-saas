# 8. DATABASE DESIGN OVERVIEW

## Main Tables

### users

Stores all users.

Recommended fields:

* id
* name
* email
* password
* avatar
* phone
* city
* google_id
* email_verified_at
* created_at
* updated_at

---

### roles

Stores role definitions.

---

### arenas

Stores sports venue data.

---

### arena_images

Stores arena images.

---

### arena_schedules

Stores operating schedules.

---

### bookings

Stores booking transactions.

---

### payments

Stores payment records.

---

### reviews

Stores user reviews.

---

### favorites

Stores favorite arenas.

---

### owner_verifications

Stores verification documents.

---

### notifications

Stores notification data.

---

### transactions

Stores financial transactions.

---

# Additional Production-Grade Tables

## webhook_logs

Stores all payment webhook callbacks for:
- idempotency protection,
- debugging,
- audit trail.

### Recommended Fields

- id
- provider
- order_id
- transaction_id
- payload
- status
- processed_at
- created_at

### Constraints

- UNIQUE(provider, order_id)

---

## platform_settings

Stores dynamic platform configuration.

### Example Use Cases

- platform fee percentage
- booking expiration duration
- default operating hours
- maintenance mode

### Recommended Fields

- id
- key
- value
- created_at
- updated_at

---

## arena_analytics_snapshots

Stores pre-calculated analytics snapshots for dashboard optimization.

### Purpose

Avoid heavy aggregate queries on realtime dashboard requests.

### Recommended Fields

- id
- arena_id
- total_bookings
- total_revenue
- avg_rating
- total_reviews
- snapshot_date
- created_at

---

## audit_logs

Stores important system activity logs.

### Example Events

- owner verification changes
- payment updates
- role changes
- booking status updates

### Recommended Fields

- id
- user_id
- action
- entity_type
- entity_id
- old_values
- new_values
- created_at

---

# Critical Field Additions

## bookings

### Additional Fields

- expires_at
- payment_checked_at
- locked_until

### Purpose

- booking expiration tracking
- payment synchronization safety
- concurrency handling

---

## payments

### Additional Fields

- raw_response
- provider_reference
- callback_received_at

### Purpose

- dispute resolution
- debugging
- webhook synchronization

---

## owner_verifications

### Additional Fields

- attempt_number
- reviewed_by
- reviewed_at

### Purpose

- support re-application
- admin review tracking
- auditability

---

# Database Constraints

## Booking Protection

Use layered protection:
- service validation
- pessimistic locking
- database constraints

### Recommended Constraint

UNIQUE(arena_schedule_id, booking_date)

---

# Recommended Indexes

## bookings

- INDEX(user_id)
- INDEX(arena_schedule_id)
- INDEX(status)
- INDEX(expires_at)

---

## payments

- INDEX(status)
- INDEX(provider_reference)

---

## owner_verifications

- INDEX(user_id)
- INDEX(status)

---

# Analytics Optimization

## Denormalized Fields

Store directly inside `arenas` table:

- avg_rating
- total_reviews

### Reason

Avoid realtime aggregate calculation on every request.

---

# Storage Strategy

## Public Storage

Used for:
- arena images
- public assets

---

## Private Storage

Used for:
- KTP documents
- selfie verification
- sensitive files

### Access Method

- signed temporary URLs only
- no direct public access