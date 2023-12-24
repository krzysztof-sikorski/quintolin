# Search

## Searching algorithm

- Get "loot table" from tile's terrain type
- Update loot table according to current season
  (some items have different find chances in different seasons)
- Reduce find chances based on tile depletion (details below)
- Calculate total chance to find anything
- If total chance is zero then display system message and skip next steps
- Pick a random number (0%-100%)
- Compare the number with the loot table to determine if and what was found
- If no item was found then display system message and skip next steps
- Update character's inventory
- Update tile depletion (details below)

## Depletion in v2

Depletion of tiles is stored in **HP** column.

Each successful search has **15%** chance to reduce tile's **HP** by one point.

Low HP reduces all chances in loot table:

- When **HP > 2** then chances are not modified
- If **HP equals 2** then chances are multiplied by **75%**
- If **HP equals 1** then chances are multiplied by **50%**
- If **HP equals 0** then chances are reduced to zero

Each daily tick restores **1 HP**.

## Depletion in v3

The game stores total number of items found in a tile.
These counters are reset on daily tick.

High counter reduces chances in loot table:

- When **searches < 6** then chances are not modified
- If **searches between 6 and 11** then chances are multiplied by **75%**
- If **searches between 12 and 17** then chances are multiplied by **50%**
- If **searches >= 18** then chances are reduced to zero

Additionally, some terrain types (forest, pine forest, grassland)
are actually sets of terrain types, representing various levels of depletion.

Forests and pine forests have **five** variants: the first three levels
of depletion are displayed identically in game interface (as forest),
heavy depletion is displayed as grass, and a complete depletion is displayed
as dirt.

Grassland has **two** levels of depletion, the depleted variant is displayed
as dirt.

After an item was found, a second random number is rolled, this time to check
if tile transformed into a next depletion level. The chance for that
transformation is equal to found item's find chance in calculated loop table.
