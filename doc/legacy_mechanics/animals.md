# Animals

Documentation how animals were defined in previous versions of the game.

Definitions from v2 are stored in [animals.csv](data/animals.csv) file.
Description of columns below.

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
| loot_bonus    | map(reference,int) | additional loot for characters with `butchering` skill                       |
| immobile      | bool               | unable to move (never executes "flee" action)                                |

## Notes

- The CSV file contains values from Buttercup's fork,
  as it was the latest "official" version.
- The `loot_bonus` field was added in Miko's fork
- Mammoth was added in Miko's fork, it was not present in original v2.
