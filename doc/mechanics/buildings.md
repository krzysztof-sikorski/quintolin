# Buildings

Documentation how buildings were defined in previous versions of the game.

Definitions from v2 are stored in [buildings.csv](data/buildings.csv) file.
Description of columns below.

| Field            | Data type            | Description                                                  |
|------------------|----------------------|--------------------------------------------------------------|
| key              | string               | unique identifier (in code)                                  |
| id               | int                  | unique identifier (in database)                              |
| name             | string               | displayed name                                               |
| size             | enum                 | building size (small/large), restricts where it can be built |
| floors           | int                  | number of floors (zero/one)                                  |
| max_hp           | int                  | maximum HP                                                   |
| build_ap         | int                  | building cost in AP                                          |
| build_xp         | int                  | XP reward for building                                       |
| materials        | map(string,int)      | required materials (items to be spent)                       |
| build_msg        | string               | message displayed when building is finished                  |
| tools            | list(reference)      | required tools                                               |
| build_skill      | list(reference)      | required skills                                              |
| build_xp_type    | reference            | type of XP reward                                            |
| prereq           | reference            | prerequisite building                                        |
| settlement_level | enum                 | required settlement level (values: nothing/village)          |
| interior         | optional(string)     | description of interior                                      |
| ap_recovery      | float                | bonus to AP recovery                                         |
| actions          | list(reference)      | actions enabled by building                                  |
| unwritable       | bool                 | blocks writing on wall                                       |
| terrain_type     | reference            | while building exist, change terrain type to this            |
| special          | enum                 | special mechanics                                            |
| build_hp         | int                  | initial HP after being built                                 |
| use_skill        | reference            | skill that is boosted by being inside                        |
| effect_bonus     | map(reference,float) | multipliers for effects of specific actions done inside      |
| craft_ap_bonus   | map(reference,float) | multipliers for AP costs of specific actions done inside     |

**Note:** building size for **bakery** is not an error but an unfixed bug.
Actual effect in game was that building ignored all terrain restrictions.
