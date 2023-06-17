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
