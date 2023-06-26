# Ticks

Documentation about background operations ("ticks").

## Summary

Both v2 and v3 were using `crontab` to execute ticks.

Ticks were grouped in four ets, differing by their frequency:

- Daily tick (every midnight)
- Hunger tick (every 8 hours: at 00:00, 08:00, 16:00)
- Hourly tick (every full hour)
- Minutely tick (every full minute, only used in v3)

| Operation                | Schedule |
|--------------------------|----------|
| Restore AP               | Hourly   |
| Burn campfires           | Hourly   |
| Move animals             | Hourly   |
| Hunger                   | Hunger   |
| Update settlement leader | Daily    |
| Grow fields              | Daily    |
| Deactivate users         | Daily    |
| Restore search odds      | Daily    |
| Reset daily IP limits    | Daily    |
| Spawn animals            | Daily    |
| Terrain transitions      | Daily    |
| Rot food                 | Daily    |
| Damage buildings         | Daily    |

## Restore AP

Every character regenerates AP.

Regenerated amount depends on many factors:

- If **HP == 0** then regenerate **1 AP**
- Otherwise regenerate **3 AP** plus bonuses from building and terrain type
- Building bonus is defined in building definition
- Tile bonus is defined in terrain type definition
- Final AP value is rounded to first decimal digit

## Burn campfires

Roll a dice for each campfire on map.
There is **50%** chance that it will be damaged.

If a campfire is damaged:

- Set **HP := HP - 1**
- Notify characters on tile if **HP == 5**
- If **HP == 0** then completely remove campfire from tile.

## Move animals

If animal has **immobile = True** then it never moves.

Otherwise it tries **8 times** to move in a random direction to adjacent tile.
The move succeeds if destination tile is allowed by animal's **habitats** list.

## Hunger

Hunger mechanic is only applied to users that are **active == true** and either:
do not have **full AP** or have executed an action in the last **24h**.

For each eligible user:

- If **hunger > 0** then set **Hunger := Hunger - 1** and skip to the next user
- If user has any food (items marked with **use==eat**) then eat a random food
  and skip to the next user
- Set **HP := max(HP - 3, 0)**
- Set **Max_HP := max(Max_HP -2, 25)**

## Update settlement leader

For each settlement, member with the most supporters is set as the leader.
Users with **active == false** or **HP == 0** are not counted as supporters.

## Grow fields

If **season is not Summer** then do nothing.

For each **wheat_field** tile, set **HP := min(HP * 4, 200)**.

## Deactivate users

Mark users as inactive (**active == false**)
if they executed no actions in the last **5 days**.

## Restore search odds

Roll a dice for each tile, chance for restore is defined as **restore_odds**
in terrain type.

If a tile is restored and it is **dirt_track**
then change it into **grassland** with **1 HP**.

If a tile is restored and it is any other type, set **HP := min(HP+1, Max HP)**.

## Spawn animals

For each region iterate over its **animals_per_100** mapping.
The mapping defines expected ratios of each animal type per 100 tiles.

For each animal on the map:

- Fetch all tiles in the region
  that have terrain types matching animal's **habitats** list.
- Set **tile_cnt** to be the number of matching tiles
- Set **amt** to be the ratio defined in the mapping
- Set **mult** to be a random number **between 50% and 150%**
- Number of spawned animals is: **(tile_cnt/300) * amt * mult**
- Distribute the spawned animals randomly between the matching tiles.

## Terrain transitions

Some terrain types can transition to other terrain types.
Roll a dice for each tile with such type, on success change terrain type.

New terrain type is defined in **transition** field.
Transition chances for each season are defined in **transition_odds** field.
If **transition_odds** is a single number then the chance is the same for each
season.

## Rot food

Chance for rot is defined in global setting **Food_Rot_Chance**.

Rot is only applied to food (items with **use=eat**).

Roll dice for each food item in inventory and for each food item in stockpile.
On success change item type to **rotten_food**.

## Damage buildings

Roll a dice for each region.
There is a hard-coded **10%** chance that the region will be hit by storm.

For each building in a region that was hit by storm:

- If building has **special == settlement** then it is not damaged.
  Currently that flag is only set for totems.
- Set damage to random integer **between -5 and 10**
- If **damage > 0** then deal that damage to the building as if it was attacked.
