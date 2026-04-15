<?php

namespace Planpoint\Types;

enum UnitFullStatus: string
{
    case Available = "Available";
    case OnHold = "OnHold";
    case Sold = "Sold";
    case Leased = "Leased";
    case Unavailable = "Unavailable";
}
