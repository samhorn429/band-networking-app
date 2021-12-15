<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BandUser;
use App\Models\Connection;
use App\Models\ConnectionRequest;
use App\Models\HasBeenAMemberOf;
use App\Models\HasTalent;
use App\Models\LikesGenre;
use App\Models\MemberRoles;
use App\Models\Message;
use App\Models\MusicianUser;
use App\Models\NoAccountBands;
use App\Models\NoAccountBandGenre;
use App\Models\NoAccountMembers;
use App\Models\SearchingFor;
use App\Models\Talents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        BandUser::factory()->populateBandUsers();
        Connection::factory()->populateConnections();
        ConnectionRequest::factory()->populateConnectionRequests();
        HasBeenAMemberOf::factory()->populateHasBeenAMemberOf();
        HasTalent::factory()->populateHasTalent();
        LikesGenre::factory()->populateLikesGenre();
        MemberRoles::factory()->populateMemberRoles();
        Message::factory()->populateMessages();
        MusicianUser::factory()->populateMusicianUsers();
        NoAccountBandGenre::factory()->populateNoAccountBandGenres();
        NoAccountBands::factory()->populateNoAccountBands();
        NoAccountMembers::factory()->populateNoAccountMembers();
        SearchingFor::factory()->populateSearchingFor();
        Talents::factory()->populateTalents();
    }
}
