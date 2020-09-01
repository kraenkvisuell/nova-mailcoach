<?php

namespace Kraenkvisuell\NovaMailcoach\Imports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Mailcoach\Models\Subscriber;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubscribersImport implements ToCollection, WithHeadingRow
{
    private $importedRows = 0;
    private $notImportedRows = 0;
    public $emailListId;

    public function __construct($emailListId)
    {
        $this->emailListId = $emailListId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $email = $row['email'] ?? ($row['e-mail'] ?? @$row['e_mail']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $firstName = $row['first_name'] ?? ($row['firstname'] ?? @$row['vorname']);
                $lastName = $row['last_name'] ?? ($row['lastname'] ?? @$row['nachname']);
                $this->importedRows++;

                Subscriber::updateOrCreate(
                    [
                        'email' => $email,
                    ],
                    [
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'email_list_id' => $this->emailListId,
                        'subscribed_at' => Carbon::now()
                    ]
                );
            } else {
                $this->notImportedRows++;
            }
        }
    }

    public function getImportedRowCount(): int
    {
        return $this->importedRows;
    }
    public function getNotImportedRowCount(): int
    {
        return $this->notImportedRows;
    }
}
