<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $userData = [
        'nama' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter',
                'max_length' => 'Nama maksimal 100 karakter',
            ],
        ],
        'nim' => [
            'rules' => 'required|min_length[3]|max_length[100]|is_unique[user_data.nim]',
            'errors' => [
                'required' => 'NIM harus diisi',
                'min_length' => 'NIM minimal 3 karakter',
                'max_length' => 'NIM maksimal 100 karakter',
                'is_unique' => 'NIM sudah terdaftar',
            ],
        ],
        'universitas' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Nama universitas harus diisi',
                'min_length' => 'Nama universitas minimal 3 karakter',
                'max_length' => 'Nama universitas maksimal 100 karakter',
            ],
        ],
        'kontak' => [
            'rules' => 'required|numeric|min_length[10]|max_length[14]',
            'errors' => [
                'required' => 'Kontak harus diisi',
                'numeric' => 'Kontak harus berupa angka',
                'min_length' => 'Kontak minimal 10 karakter',
                'max_length' => 'Kontak maksimal 14 karakter',
            ],
        ],
        'kpm' => [
            'rules' => 'uploaded[kpm]|ext_in[kpm,pdf,PDF]',
            'errors' => [
                'uploaded' => 'KPM harus diisi',
                'ext_in' => 'KPM harus berupa file pdf',
            ],
        ],
    ];

    public $berkas = [
        'berkas' => [
            'rules' => 'uploaded[berkas]|ext_in[berkas,rar,zip]',
        ],
        'tim_id' => [
            'rules' => 'required|is_not_unique[data_tim.tim_id]',
        ],
    ];

    public $daftarSeminar = [
        'nama' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter',
                'max_length' => 'Nama maksimal 100 karakter',
            ],
        ],
        'kontak' => [
            'rules' => 'required|numeric|min_length[10]|max_length[14]',
            'errors' => [
                'required' => 'Kontak harus diisi',
                'numeric' => 'Kontak harus berupa angka',
                'min_length' => 'Kontak minimal 10 karakter',
                'max_length' => 'Kontak maksimal 14 karakter',
            ],
        ],
    ];

    public $adminSeminar = [
        'username' => [
            'rules' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
            'errors' => [
                'required' => 'Username harus diisi',
                'min_length' => 'Username minimal 3 karakter',
                'max_length' => 'Username maksimal 100 karakter',
                'is_unique' => 'Username sudah terdaftar',
            ],
        ],
        'email' => [
            'rules' => 'required|min_length[3]|max_length[100]|valid_email|is_unique[auth_identities.secret]',
            'errors' => [
                'required' => 'Email harus diisi',
                'min_length' => 'Email minimal 3 karakter',
                'max_length' => 'Email maksimal 100 karakter',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah terdaftar',
            ],
        ],
        'password' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 3 karakter',
                'max_length' => 'Password maksimal 100 karakter',
            ],
        ],
        'nama' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter',
                'max_length' => 'Nama maksimal 100 karakter',
            ],
        ],
        'phone' => [
            'rules' => 'required|numeric|min_length[10]|max_length[14]',
            'errors' => [
                'required' => 'Kontak harus diisi',
                'numeric' => 'Kontak harus berupa angka',
                'min_length' => 'Kontak minimal 10 karakter',
                'max_length' => 'Kontak maksimal 14 karakter',
            ],
        ],
        'instansi' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Instansi harus diisi',
                'min_length' => 'Instansi minimal 3 karakter',
                'max_length' => 'Instansi maksimal 100 karakter',
            ],
        ],
        'domisili' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'Domisili harus diisi',
                'min_length' => 'Domisili minimal 3 karakter',
                'max_length' => 'Domisili maksimal 100 karakter',
            ],
        ],
        'kategori' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus diisi',
            ],
        ],
        'status' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Status harus diisi',
            ],
        ],
    ];

    public $submissionProposal = [
        'proposal' => [
            'rules' => 'ext_in[proposal,pdf,PDF]',
            'errors' => [
                'ext_in' => 'Proposal harus berupa file pdf',
            ],
        ],
    ];

    public $submissionSourceCode = [
        'source_code' => [
            'rules' => 'ext_in[source_code,rar,zip]',
            'errors' => [
                'ext_in' => 'Source code harus berupa file zip atau rar',
            ],
        ]
    ];
}