# Hunger

Character attribute named "hunger" should more accurately be called "energy"
or "satiation" because that is how it actually affects the character.

Freshly created character starts with a full bar of "hunger", and the attribute
slowly goes down during ticks.

Hunger can be restored by eating food. Each food item restores **1 hunger**.
*In v2* it also restores **3 MaxHP**.

(Side note: *in v2* food is defined as items with `use=eat`,
while *in v3* food is defined as items with a tag `food`.)

When "hunger" gets close to zero, it starts to negatively affect character.

*In v2* character receives damage and cannot fully heal. Ultimately they die.

*In v3* character is not damaged, but instead their AP regeneration is reduced.

See [tick documentation](ticks.md) for exact mechanics and formulas.
