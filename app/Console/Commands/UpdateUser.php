<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update {id} {comments}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));

        if ($user) {
            $user->comments .= "\n".$this->argument('comments');
            $user->save();
            echo 'Success.';
        } else {
            echo 'User not found.';
        }
        
        return 0;
    }
}
