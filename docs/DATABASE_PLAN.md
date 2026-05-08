# Main Tables

## users
- id
- name
- email
- password
- role_id

## arenas
- id
- owner_id
- name
- description
- location
- price_per_hour
- status

## bookings
- id
- user_id
- arena_id
- booking_date
- start_time
- end_time
- total_price
- admin_fee
- booking_status

## payments
- id
- booking_id
- payment_method
- payment_status
- transaction_id

## reviews
- id
- user_id
- arena_id
- rating
- review