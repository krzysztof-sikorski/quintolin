# Character actions

This file lists all possible character actions.

## Add fuel to campsite

This can be done only if campsite has **HP < 30**.

The action costs **1 AP**, consumes **1 stick** and sets **HP := HP + 1**.

This action gives **1 wanderer XP**.

## Attack

Attack animal, building, or another character.

Attacking a character or animal costs **1 AP**.
Attacking a building costs **5 AP**.

Chance to hit and damage dealt depend on character skills and used weapon.

*In v2* buildings are extremely resistant to damage, every hit has **1/3**
chance that damage will be completely blocked and **2/3** chance that damage
will be reduced to **1 HP**.

*In v3* only a few weapons (**stone axe**, **ivory axe**, and admin weapons)
can be used to attack buildings, but actual damage is the same as when attacking
people or animals.

Successful hit gives variable amount of **warrior XP**.
Killing blow to a character/animal and final blow to a building give
**20 + damage dealt** XP.
Normal hit gives **(damage + 1) / 2** XP.

Each attack (no matter if hit or miss) also has a chance to break used weapon.
Chance of breakage depends on item type and is stored in item definition.

### Attack restrictions (v2)

**Totem Pole** can only be attacked in there are no "large" buildings
(buildings with non-empty `settlement_level` and non-zero `floors`)
in a radius of **5 tiles** around it.

### Attack restrictions (v3)

There are traces of an attempt to implement the same restriction as in v2.

Also, a building that stands withing the boundaries of a settlement
cannot be attacked if its tile contains (inside or outside) at least one
non-provisional settlement member that is not dazed (= has **HP > 0**).

## Build/Repair

Creates a building on a tile if user has appropriate skill, items, and AP.
Most of the buildings are also restricted in that they can be only built
inside a settlement.

*In v2** some special buildings (**field** and **dirt_track**) automatically
change their tile's terrain type when finished.

*In v2* cost of repairing a building is equal to the cost of building it.
*In v2* cost of repairing a building is different (usually lower)
than the cost of building it.

This action gives XP, exact type and amount of XP depend on building type.

## Chat/Say

Adds a message to speaker's and recipients' message logs.

There are a few different types of speaking:

- **whisper** to a single person
- **speak** to all characters on the same tile
- **shout** to all characters on current and nearby tiles in **8 tiles** radius
- *only in v3* send message to all members of your **settlement**

Game versions differ in AP cost of speaking:

- *in v2* basic speaking costs **0.2 AP** and shouting costs additional **2 AP**
- *in v3* all kinds of speaking do not cost AP

## Chop

Chopping a tree requires an axe in inventory and an appropriate terrain type.

Chopping costs **4 AP** with *Lumberjack* skill, and **8 AP** without it.

Chopping gives **1 log** and **2 wanderer XP**.

Every time this action is executed, there is a **12%** chance that current tile
will transform into a different terrain type, representing a more depleted tile.

*In v2* transformations are hard-coded as follows:

- `pine_forest_3` transforms into `pine_forest_2`
- `pine_forest_2` transforms into `pine_forest_1`
- `thick_forest` transforms into `forest`
- `forest` transforms into `woodland`
- `pine_forest_1` and `woodland` transform depending on tile's **HP**:
  if zero then into `dirt_track`, otherwise into `cleared_wood`

*In v3* transformation are the same as damage from searching
(see [Search](search.md) page).

## Craft

Crafting produces new items from existing items.

Some of crafting recipes require not only raw materials, but also crafting
tools, knowing an appropriate skill, or being inside an appropriate building.

Exact AP cost and XP reward also depend on particular recipe.

## Dig

This action is similar to search, in that it has a chance to give a random item
from terrain type's dig table. The main difference is that digging requires
a tool (*in v2*: digging stick, *in v3*: spade).

*In v2* digging costs **1 AP**.
*In v3* digging costs **2 AP**.

Successful digging gives **1 wanderer XP**.

Also, *in v3* digging depletes current tile by increasing search counter
(the same way as search action).

## Drop an item

This action does not cost AP.

Selected item is removed from character's inventory and added to tile's
inventory.

If a tile contains a **stockpile** building, then dropping items is not allowed,
but **give** action is available instead.

Dropped items can be found later by searching.
See [Search](search.md) page for details.

## Fill

This action fills a pot with water. It costs **1 AP**.

Internally, this action converts a single **pot** item in character's inventory
into **pot_water** item.

*In v2* this action does not give XP.
*In v3* this action gives **1 wanderer XP**.

## Give

Character can give a single item or stack of items of the same type to selected
target.

Target can be another character or a **stockpile** building.
In the latter case the items are added directly to current tile's inventory.

This action does not give XP.

*In v2* this action costs **1 AP** (no matter how many items were given).

*In v3* this action does not cost AP, but it is impossible to give items
to a character if it would overburden them.

## Harvest

This action can only be done in **Autumn**, on a **wheat_field** terrain type.

This action requires a tool (hand axe, stone axe, stone sickle)
and **Agriculture** skill.

This action costs **8 AP** when using a sickle, but **16 AP** when using
a different tool.

Amount of wheat available in a field is stored in **building_hp** property.
Harvesting decreases field's HP by **10 HP** but not lower than to zero,
and produces **wheat** in amount equal to removed HP.

If field's HP is reduced to zero, then the field is completely depleted.
This is represented internally in a different way depending on game version:

- *in v2* this changes terrain type to **empty_field**.
- *in v3* this removes the **field** building from tile

XP gain also depends on version:

- *in v2* this action does not give XP
- *in v3* this action gives **4 herbalist XP**

## Join/Leave

To join a settlement, character has to be in the same tile as the settlement's
**Totem Pole**. Leaving a settlement can be done anywhere.

*In v2* joining a settlement does not cost AP.
*In v3* joining a settlement costs **25 AP**.
In both versions leaving does not cost AP.
Both actions do not give XP.

*In v3* joining a settlement is done in two stages: applicant first becomes
a *provisional* member, and later then can be promoted to a normal member
by settlement's leader, or they get promoted automatically during a daily tick.

## Kick

This action is only available in v3.

Removes a member from settlement.

This action costs **25 AP** and it can only be done by settlement leader.

## Kick out

This action is only available in v3.
It forcibly removes a dazed character from building interior.

This action costs **5 AP** and does not give XP.

## Move

Character can enter or exit a building. Character can also travel in one of
cardinal directions (N, NE, E, SE, S, SW, W, NW) to one of adjacent tiles.
This variant of movement costs a different amount of AP depending on character
skills and destination tile's terrain type.

Some terrain types (cliff, deep water) cannot be entered at all
if character does not know required skill.

Game versions differ in how over-encumbrance affects movement:

- *In v2* this action cannot be done if character is over-encumbered.
- *In v3* if character is over-encumbered then AP cost of movement is doubled?

Game versions also differ whether movement grants XP:

- *in v2* some terrain types grant a small amount of **wanderer XP** on move
- *in v3* movement never grants XP

## Quarry

This action requires **quarrying** skill, **bone_pick** item in inventory,
and being on **cliff_bottom** terrain type.

Each quarry action costs **4 AP** and has a **50%** chance to succeed.
On success it gives **1 boulder**, on failure it gives nothing.

*In v3* this action gives **3 builder XP**.

After quarrying a standard "break check" test is done to see if the pick broke.

## Revive self

This action is only available in v3.

This action is available only if character was dazed for at least **24 hours**
and they are not in foreign settlement.

This action has variable AP cost and restore a variable amount of HP.

Base cost is **48 AP**, but it is reduced by being inside **hospital**
or having **hospitaller** skill.

Base heal is **10 HP**, but it is increased by being inside **hospital**
or having **medicine** skill.

## Sacrifice

Sacrifices an item to the gods. This action is only available *in v3*.

This action costs **1 AP** and increases settlement's **favor**.

This action requires a shrine building and an appropriate item.

Currently there is only one shrine type in game (**shrine_hunter**),
it accepts only one type of item (**ivory_tusk**),
and it increases favor by **1 point**.

## Settle

This action creates a new settlement by building a **Totem Pole**.

The action works similar to other types of building (AP & material cost, etc),
but has additional restrictions:

- the totem pole cannot be placed too close to other settlements
  (minimal distance is **20 tiles**, measured geometrically)
- there must be at least **3 huts** built nearby (in radius of **5 tiles**)

Of course, settling also requires picking a name and a description
of the new settlement.

## Search

See [search](search.md) page.

## Sow

This action can only be done on **Spring**, and only on a tile that contains
**field** building. It also requires **agriculture** skill.

*In v3* the action also requires a tool (**hoe**).

The action costs **15 AP** and **10 pieces** of an item marked with
**plantable=true** (currently only **wheat** is marked that way).

This action can also fail if the tile is overused. Exact mechanic is different
between versions:

- *In v2* every sowing has a constant chance of **20%** to fail, even if the
  tile was never sown before. On failure a system message about "overfarming"
  is displayed, the whole action is cancelled (without spending AP nor items)
  and tile's terrain type is changed to **dirt_track**.
- *In v3* the game tracks usage in **overuse** property:
  - the game blocks ability to create **field** when **overuse > 24**
  - sowing sets **HP := 1** and sets **overuse := overuse + 12** on tile
  - **overuse** slowly decreases on daily tick

*In v2* This action does not give XP.
*In v3* this action gives **10 herbalist XP**.

## Take

Character can only take items from stockpile if they are member of the same
settlement.

*In v2* this action always costs **1 AP**, no matter how many items are taken.
*In v3* this action costs AP equal to count of taken items.

This action does not give XP.

## Use

Character can attempt to use an item. Exact mechanic depends on the item:

- Food can be eaten to reduce effects of hunger
- Some items heal damage (restore HP)
- Some items revive a dazed character

Using an item costs **1 AP** and gives variable amount of XP depending on item
effect.

The **noobcake** item has special properties:

- *in v2* this item can only be used when **level = 1**
- *in v3* this item can be used at any level but it cannot be dropped

## Water

This action can only be done in **Spring** or **Summer**. It requires
a **water_pot** item and being in a tile with **field** building.

The action costs **1 AP** and changes **water_pot** into **pot**.

Result of watering depends on game version.

### Watering in v2

Calculate field growth:

- if building has **HP < 15**
  then growth is a random integer **between 0 and 3**
- otherwise growth is a random integer **between -10 and 3**

If growth is greater than zero, then increase building's HP by growth value.
Otherwise damage tile by **1 HP** and display message about damaging the crops.

In both cases the action gives **1 herbalist XP**.

### Watering in v3

Watering cannot damage a tile but it can only be done once per day
(this is tracked by setting **watered := true** in tile properties).

The action increases field's HP by **3 HP**, up to maximum of **200 HP**.

This action gives **3 herbalist XP**.

### Write

Creates or updates a label on a building.

This action requires a tool (**hand_axe** or **stone_carpentry**).

Some buildings (**totem_pole** and **campfire**) are unwritable.

This action costs **3 AP** and gives no XP.
