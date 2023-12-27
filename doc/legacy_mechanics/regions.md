# Regions

Documentation how regions were defined in previous versions of the game.

Definitions from v2 are stored in [regions.csv](data/regions.csv) file.
Description of columns below.

| Field           | Data type            | Description                                                        |
|-----------------|----------------------|--------------------------------------------------------------------|
| key             | string               | unique identifier (in code)                                        |
| id              | int                  | unique identifier (in database)                                    |
| name            | string               | displayed name                                                     |
| animals_per_100 | map(reference,float) | percentage proportions of spawned animals (defaults to no animals) |

## Notes

- The CSV file contains values from Buttercup's fork,
  as it was the latest "official" version.
- Region added in Miko's fork: **Unknown_Ruins**
