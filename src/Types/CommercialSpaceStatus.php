<?php

namespace Planpoint\Types;

enum CommercialSpaceStatus: string
{
    case Available = "Available";
    case OnHold = "OnHold";
    case Sold = "Sold";
    case Leased = "Leased";
    case Unavailable = "Unavailable";
}
