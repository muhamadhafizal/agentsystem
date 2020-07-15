<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $users = User::select('name','email','nickname','ic','contact','level')->where('role', 'agent')->orderBy('created_at','ASC')->get();
        
        
        return $users;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Nickname',
            'Ic',
            'Contact',
            'Level'
        ];
    }
}
