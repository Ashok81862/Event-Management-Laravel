### Conference Events ###
-------------------------

## Media
- id
- name (nullable)
- path  
- type (Jpeg, Jpg, Png)

## User
- id
- media_id
- name
- email
- role

## Speakers
- id
- name
- Description
- Full Description
- media_id
- social links

## Schedule
- id
- start_time
- title (required)
- subtitle
- speaker_id

## Venues
- id
- name
- media_id
- address
- latitude
- longitude
- description

## Hotels
- id
- name
- media_id
- address
- description
- rating

## Galleries
- id
- name
- media_id

## Sponsors
- id
- name
- media_id (logo)
- email or links

## FAQ
- id
- question
- answer

## Amenities
- id
- name

## Prices
- id
- name
- price

## Migration Table Prices and Amenities
- id
- amenities_id 
- price_id 
