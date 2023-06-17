# Animals

Documentation how animals were stored in previous versions of the game.

| Field         | Data type          | Description                                                                  |
|---------------|--------------------|------------------------------------------------------------------------------|
| key           | string             | unique identifier (in code)                                                  |
| id            | int                | unique identifier (in database)                                              |
| name          | string             | displayed name (singular)                                                    |
| plural        | string             | displayed name (plural)                                                      |
| habitats      | list(reference)    | list of terrain categories the animal will enter                             |
| max_hp        | int                | maximum HP                                                                   |
| when_attacked | map(enum,int)      | possible responses to an attack, keys: (flee/attack), values are percentages |
| attack_dmg    | optional(int)      | damage dealt on attack retaliation                                           |
| hit_msg       | optional(string)   | attack message                                                               |
| loot          | map(reference,int) | list of items dropped on death                                               |
| immobile      | bool               | unable to move (never executes "flee" action)                                |
