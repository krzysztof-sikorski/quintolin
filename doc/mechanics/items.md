# Items

Documentation how items were stored in previous versions of the game.

| Field          | Data type                    | Description                                                                               |
|----------------|------------------------------|-------------------------------------------------------------------------------------------|
| key            | string                       | unique identifier (in code)                                                               |
| id             | int                          | unique identifier (in database)                                                           |
| name           | string                       | displayed name (singular)                                                                 |
| plural         | string                       | displayed name (plural)                                                                   |
| desc           | string                       | long description                                                                          |
| weight         | int                          | item weight                                                                               |
| Autumn         | optional(float)              | multiplier to search chance in Autumn                                                     |
| Winter         | optional(float)              | multiplier to search chance in Winter                                                     |
| use            | enum                         | action when item is used (weapon/heal/revive/food)                                        |
| break_odds     | optional(int)                | chance for breaking on attack                                                             |
| accuracy       | or(int,map(reference,int))   | base attack chance (percentage), if map then depends on skill                             |
| effect         | or(int,map(reference,int))   | magnitude of effect (damage for attack, HP healed for heal), if map then depends on skill |
| weapon_class   | optional(enum)               | weapon class (blunt/stab/slash)                                                           |
| craftable      | bool                         | can it be crafted?                                                                        |
| craft_ap       | optional(int)                | crafting cost in AP                                                                       |
| craft_xp       | optional(int)                | XP reward for crafting                                                                    |
| materials      | optional(map(reference,int)) | crafting material (items to be spent)                                                     |
| tools          | optional(list(reference))    | required crafting tools                                                                   |
| craft_amount   | optional(int)                | size of crafted batch of items (defaults to 1)                                            |
| craft_xp_type  | optional(enum)               | type of XP reward                                                                         |
| craft_building | optional(reference)          | building required for crafting                                                            |
| craft_skill    | optional(reference)          | skill required for crafting                                                               |
| plantable      | optional(bool)               | can be planted?                                                                           |
| extra_products | map(reference,int)           | additional items created along with the main batch                                        |
