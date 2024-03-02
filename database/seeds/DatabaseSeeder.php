<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concepts')->insert(['id' => 1, 'name' => 'Character', 'icon' => 'fa-user']);
        DB::table('concepts')->insert(['id' => 2, 'name' => 'Place', 'icon' => 'fa-map-marked-alt']);
        DB::table('concepts')->insert(['id' => 3, 'name' => 'Item', 'icon' => 'fa-box-oepn']);
        DB::table('concepts')->insert(['id' => 4, 'name' => 'Group', 'icon' => 'fa-users']);
        DB::table('concepts')->insert(['id' => 5, 'name' => 'Event', 'icon' => 'fa-stopwatch']);
        DB::table('concepts')->insert(['id' => 6, 'name' => 'Note', 'icon' => 'fa-sticky-note']);
        DB::table('concepts')->insert(['id' => 7, 'name' => 'Folder', 'icon' => 'fa-folder']);
        DB::table('concepts')->insert(['id' => 8, 'name' => 'Player Character', 'icon' => 'fa-user-circle']);
        DB::table('concepts')->insert(['id' => 9, 'name' => 'Adventure', 'icon' => 'fa-compass']);
        DB::table('concepts')->insert(['id' => 10, 'name' => 'Session Log', 'icon' => 'fa-book']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'COMPONENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CONTAINER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'LOOT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PROP_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'RELATED_ITEM_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'UPGRADE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ENCOUNTER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'NEXT_EVENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'OPPOSING_EVENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PLOT_HOOK_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'RELATED_EVENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SESSION_LOG_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUB_EVENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'AGENT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ALIAS_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ALLY_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ANTAGONIST_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'BENEFACTOR_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'BUSINESS_PARTNER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CAPTAIN_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CHAMPION_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'COMPANION_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CONTACT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CREW_MEMBER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'DESTROYER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'EARNER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'EMPLOYEE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ENEMY_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'FATHER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'FOUNDER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'FRIEND_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'GOD_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'GUARDIAN_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'HALF_SIBLING_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ICON_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'KILLER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'LEADER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'MAKER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'MEMBER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'MENTOR_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'MOTHER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ORGANIZER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'OWNER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PARAMOUR_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PARTICIPANT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PATRON_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PRISONER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PROTAGONIST_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'RESCUER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'RIVAL_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SEEKER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SERVANT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SIBLING_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SPOUSE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'STEWARD_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUBORDINATE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'USER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'FACTION_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PANTHEON_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUBGROUP_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'BIRTHPLACE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'BRANCH_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'CAPITAL_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'HEADQUARTERS_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'HOME_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'HOMEWORLD_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'IN_ORBIT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'LOCATION_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'NEIGHBOR_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SETTING_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUBREGION_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'TRAINING_GROUND_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'FOLDER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'ACT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUBFOLDER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'GM_NOTE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'NEXT_NOTE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'NOTE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'PLAYER_HANDOUT_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'RELATED_NOTE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'SUBNOTE_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'GRAND_MOTHER_OF']);
        DB::table('connection_types')->insert(['id' => null, 'label' => 'GRAND_FATHER_OF']);
    }
}
