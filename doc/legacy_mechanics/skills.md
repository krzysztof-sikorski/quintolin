# Skills

Documentation how skills were defined in previous versions of the game.

Definitions from v2 are stored in [skills.csv](data/skills.csv) file.
Description of columns below.

| Field  | Data type | Description                        |
|--------|-----------|------------------------------------|
| key    | string    | unique identifier (in code)        |
| id     | int       | unique identifier (in database)    |
| name   | string    | displayed name                     |
| type   | reference | type/category of skill             |
| desc   | string    | long description                   |
| prereq | reference | skill required to learn this skill |

## Notes

- The CSV file contains values from Buttercup's fork,
  as it was the latest "official" version.
- The skill **javelin** was present in original v2
  but later deleted in Miko's fork
- Skills added in Miko's fork: **unarmed3**, **unarmed4**
