<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

use CodeIgniter\Shield\Entities\User;

class CreateSuperUser extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Admin';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'create:superuser';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Create a new Super User';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:name [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $username = CLI::prompt('Enter username');
        CLI::newLine(1);

        $email = CLI::prompt('Enter email');
        CLI::newLine(1);

        $password = CLI::prompt('Enter password');
        CLI::newLine(1);

        $users = auth()->getProvider();

        $user = new User([
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
        ]);
        $users->save($user);

        $user = $users->findById($users->getInsertID());

        $user->addGroup('admin');
        $user->activate();

        CLI::newLIne(1);
        CLI::print('Super User created successfully');
    }
}
