<?php

namespace App\Enums;

enum TaskStatusEnum:string {

    case PENDING = "Pending";

    case WORKING = "Working";

    case DONE = "Done";
}
