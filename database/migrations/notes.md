
# City
-- Name
-- HasMany Gyms

# Gym
-- Name
-- BelongsTo City - city_id

# Trainer (User)
-- Name
-- role (trainer)
-- BelongsToMany Gyms - gyms_trainers

# Member (User)
-- Name
-- role (member)
-- BelongsTo Gym - gym_id

# Program (Scheme or WorkoutScheme)
-- Name
-- Description (pushups 3 * 12 )

# MemberPrograms
-- member_id belongsTo
-- trainer_id belongsTo
-- program_id belongsTo
-- start_date
-- end_date


make cruds where needed
 at least 
 - table list (paginations)
 - create
 - edit
 - (delete we do later)
 
