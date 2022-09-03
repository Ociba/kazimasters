<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ["Can view Dashboard","Can view Reception","Can view Registration","Can view Premedical","Can view Passport",
                        "Can view CV","Can view Training","Can view Clearance","Can View Documents","Can view Agent",
                        "Can view account settings","Can view job orders","Can view option dw at registration","Can edit dw at registration",
                        "Can delete dw at registraion","Can view trash dw  option at registraion","Can restore dw at registraion trash",
                        "Can delete dw permanently at registraion trash",'Can view option at premedical',"Can trash dw at premedical",
                        "Can view trash option at premedical","Can restore dw at premedical","Can delete dw permanently at premedical",
                       "Can view option at passport","Can edit dw at passport","Can trash dw at passport","Can view training option",
                       "Can edit dw info at training","Can trash dw at training","Can view option in trash at training","Can restore trashed dw at training",
                        "Can delete dw permanently at training trash","Can view clearance option","Can edit dw info at clearance",
                       "Can trash dw info at Clearance","Can view clearance option","Can reastore trashed dw info at clearance",
                       "Can delete dw info permanently at clearance","Can view option at Documents","Can edit dw info at documents",
                       "Can trash dw info at documents","Can view option at documents","Can restore dw info at documents",
                       "Can delete dw info permanently at documents","Can edit dw info at Company agents registration",
                       "Can trash dw info company agents registration","Can view option at Company agents registration trash",
                       "Can restore dw info at Company agents registration trash","Can delete dw info permanently at Company agents registration trash",
                       "Can view option in  users","Can delete user info permanently","Can view companies abroad option","Can edit company abroad info",
                       "Can trash company abroad info","Can view company abroad info option","Can restore company abroad info",
                       "Can delete company abroad info permanently","Can view job orders option","Can edit job orders info",
                       "Can add proof of payment at job orders","Can trash job orders info","Can view trash job orders option",
                       "Can restore trashed job orders info","Can delete trashed job orders info permanently","Can view option at reception",
                       "Can restore dw info at reception","Can delete dw info permanently at reception","Can view option at receptions",
                      "Can edit dw at reception","Can delete dw at reception","Can view IT","Can View Dw Overall Status"];

        for($i=0; $i < count($permissions); $i++){
            $permission = new Permission();
            if(Permission::where("id",$i)->exists()){
                $permission->id = $i+1;
            }
            else{
                $permission->id = $i;
            } 
                $permission->Permission=$permissions[$i];
                $permission->save();
        }
    }
}
