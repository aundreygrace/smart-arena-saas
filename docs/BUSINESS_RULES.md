# 6. OWNER VERIFICATION SYSTEM

## Verification Requirements

Venue owners must upload:

* Identity card (KTP)
* Selfie with KTP
* Venue ownership proof

---

## Verification Status

* pending
* approved
* rejected

---

## Verification Flow

Owner Registration
→ Upload Verification Documents
→ Admin Review
→ Approved / Rejected

Only verified owners can create arenas.

---

# 9. BUSINESS RULES

## Booking Rules

* Users cannot book past schedules.
* Double booking is forbidden.
* Booking expires after 15 minutes if unpaid.
* Users cannot book inactive arenas.
* Booking must fit operating hours.

---

## Arena Rules

* Only verified owners can create arenas.
* Arena must contain at least one image.
* Arena can have multiple schedules.
* Arena pricing must be positive.

---

## Payment Rules

* Platform fee is added automatically.
* Booking status updates after successful payment.
* Failed payments remain pending.

---

## Review Rules

* Only users with completed bookings can leave reviews.
* One review per booking.

---

# 10. BOOKING SYSTEM DESIGN

## Booking Status

* pending
* paid
* cancelled
* completed
* expired

---

## Booking Flow

User Selects Arena
→ Selects Schedule
→ Booking Validation
→ Payment
→ Booking Confirmation

---

## Double Booking Prevention

The system must:

* validate overlapping schedules,
* lock unavailable slots,
* reject duplicate bookings.

---

## Booking Expiration

Unpaid bookings automatically expire after 15 minutes.

---


# Booking Atomicity Rules

All booking operations must be atomic.

## Requirements

- Use DB::transaction()
- Prevent partial booking creation
- Prevent inconsistent payment state

---

# Double Booking Prevention

The system must implement layered protection.

## Protection Layers

### Layer 1 — Service Validation

Validate slot availability before booking creation.

---

### Layer 2 — Pessimistic Database Lock

Use lockForUpdate() before creating booking.

---

### Layer 3 — Database Constraint

Use UNIQUE constraints as final protection.

---

### Layer 4 — Redis Lock (Future)

Distributed locking for high traffic scalability.

---

# Booking Expiration Rules

Bookings expire automatically after 15 minutes if unpaid.

## Requirements

- expires_at field required
- expiration handled asynchronously
- payment status must be checked before expiration

---

# Payment Synchronization Rules

Payment processing must be idempotent.

## Requirements

- webhook signature verification
- duplicate webhook protection
- payment status synchronization
- safe retry handling

---

# Midtrans Webhook Rules

## Requirements

- always validate signature
- always return HTTP 200
- log all callbacks
- prevent double processing

---

# Owner Verification Security Rules

Verification documents are sensitive.

## Requirements

- store in private storage
- signed temporary access URLs only
- access logging enabled

---

# Re-Application Rules

Rejected owners may apply again.

## Requirements

- multiple verification attempts supported
- only one pending verification allowed

---

# Analytics Rules

Dashboard analytics should avoid realtime heavy queries.

## Recommended Strategy

- nightly snapshot jobs
- denormalized counters
- cached analytics responses

---

# Notification Rules

Notifications must be asynchronous.

## Queue Requirements

- booking queue
- notification queue
- analytics queue

Avoid synchronous notification sending inside request lifecycle.