# Global settings

| key               | value | description                                                               |
|-------------------|-------|---------------------------------------------------------------------------|
| Max_Hunger        | 12    | Maximum level of **Hunger** stat                                          |
| AP_Recovery       | 3.0   | Default AP recovery per hour                                              |
| Max_AP            | 100   | Maximum level of **AP** stat                                              |
| Max_Weight        | 70    | Maximum encumbrance that does not block movement                          |
| Max_Items         | 1000  | Maximum number of owned items of the same type                            |
| Max_HP            | 50    | Value of **HP** below which feeding and eating food is allowed            |
| Max_Level         | 17    | Maximum allowed level (= number of known skills)                          |
| Search_Dmg_Chance | 0.15  | Chance (in percent) that **search** action will reduce **tile HP** by one |
| Food_Rot_Chance   | 0.04  | Chance (in percent) that an item will rot in "rot food" tick              |

**NOTE:** Most of game mechanics uses HP limit that is stored individually in
characters table. That limit is initialized to hardcoded value of **50** on
character creation. Eating food is an exception and uses a global limit defined
above.
