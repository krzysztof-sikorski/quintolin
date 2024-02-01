# Terrain types

Documentation how terrain types were defined in previous versions of the game.

Definitions from v2 are stored in [terrains.csv](data/terrains.csv) file.
Description of columns below.

<!-- editorconfig-checker-disable -->

| Field           | Data type                    | Description                                                                                    |
|-----------------|------------------------------|------------------------------------------------------------------------------------------------|
| key             | string                       | unique identifier (in code)                                                                    |
| id              | int                          | unique identifier (in database)                                                                |
| ap              | or(int,map(reference,int))   | AP cost of entering tile (map if it varies by skill)                                           |
| altitude        | int                          | altitude above sea level (influences move cost)                                                |
| image           | string                       | filename of tile image                                                                         |
| class           | enum                         | terrain category (open, forest, hill, shallow_water, deep_water, wetland, cliff, beach, field) |
| Spring          | string                       | description in Spring                                                                          |
| Summer          | string                       | description in Summer                                                                          |
| Autumn          | string                       | description in Autumn                                                                          |
| Winter          | string                       | description in Winter                                                                          |
| search          | optional(map(reference,int)) | search table (item=>percentage)                                                                |
| build_tiny      | bool                         | if allows buildings of size "tiny"                                                             |
| build_small     | bool                         | if allows buildings of size "small"                                                            |
| build_large     | bool                         | if allows buildings of size "large"                                                            |
| actions         | list(reference)              | actions enabled on this terrain                                                                |
| ap_recovery     | float                        | bonus to AP recovery                                                                           |
| xp              | int                          | wanderer XP for entering tile                                                                  |
| transition      | reference                    | terrain type that can replace current one                                                      |
| transition_odds | map(reference,int)           | chances per season that terrain type changes                                                   |
| dig             | map(reference,int)           | loot chances (as percentages?) for digging                                                     |
| restore_odds    | int                          | percentage chance that tile will restore its depletion (defaults to 10%)                       |

<!-- editorconfig-checker-enable -->

## Notes

- The CSV file contains values from Buttercup's fork,
  as it was the latest "official" version.
- Search tables for `wilderness` and `sand_beach` contain a few easter egg
  entries, but game engine skips unknown items so the final result is nothing
  found.
- Property `build_tiny` was added in Miko's fork
- Terrains added in Miko's fork: **cleared_pine**, **wall**, **wall_low**,
  **track_forest**, **track_pine**, **wheat_field_watered**, **ruins**
