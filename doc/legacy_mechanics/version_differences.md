# Differences between versions

This page summarises differences between original v2 and its "official" forks.

## Fork of v2 by Miko

### Changes to mechanics and new features

- Some player actions (dazing someone, playing ocarina, etc)
  are now publicly announced to other nearby characters
- Adjusted terrain definitions and mechanics of terrain transitions
  to allow regrowing forests from dirt
- Implemented walls and guard stands
- Implemented fertility shrine
- Implemented ruins
- Implemented "tiny" building size (campfire etc)
- Added huckleberries and huckleberry pies
- Added mammoths and related items (mammoth tusk, ivory weapons, ivory pick)
- Added two new levels of Shin-Jutsu skill tree
- Updated a few terrain types to allow digging for onions
- Adjusted stats of some buildings, items, and terrains
- Require a slashing weapon (axes etc) when attacking buildings
- Buffed damage dealt to buildings (from 0-1 to 0-2)
- Animal killed by a character with `butchering` skill
- Blocked taking more than 6 items at once from a stockpile

### Bug fixes

- Fixed digging to always costs AP, no matter if loot was found or not
- Removed useless skill `javelin`
- Fixed beehives to drop honeycombs
- Fixed bug where it was possible to chop trees inside a building
- Fixed bug where it was possible to repair a campfire
- Fixed buildings' AP recovery bonuses to only work inside
- Fixed `butchering` skill to actually give extra loot
  (defined in `loot_bonus` property) when an animal is killed
- Implemented additional checks to block dazed characters
  and characters with less than **1 AP** from acting
- Fixed animal spawning limits to also take into account animals
  that wandered out from their original region

### Other changes

- Changed adjectives used in description of building's HP
- Blocked possibility to attack oneself and to attack while dazed

## Fork of v2 by Buttercup

### Changes to mechanics and new features

- Implemented temporary membership mechanic
- Implemented leaving a settlement
- Implemented "gate house" building
- Adjusted stats of field and guard stand buildings
- Adjusted stats of stone axe
- Adjusted stats of some terrain types
- Changed harvesting action to give XP
- Adjusted effect of watering a field

### Bug fixes

- Blocked "give" and "take" actions to be executed in situations
  where they would over-encumber target character
- Fixed repair action to not be available for campfires
  and for buildings with no damage
- Blocked revive action when character was within borders of foreign settlement
- Blocked reviving of starving characters (defined as `hunger = 0`)

### Other changes

- Added "very abundant" state to tile abundance scale
