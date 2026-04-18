# planpoint-sdk-php

Official PHP SDK for the [PlanPoint](https://app.planpoint.io) API.

## Requirements

- PHP 8.1+
- Composer

## Installation

```bash
composer require planpoint/planpoint
```

> **Note:** If the package is not yet on Packagist, install directly from GitHub:
>
> ```json
> {
>   "require": { "planpoint/planpoint": "dev-main" },
>   "repositories": [
>     {
>       "type": "vcs",
>       "url": "https://github.com/planpoint-io/planpoint-sdk-php"
>     }
>   ],
>   "minimum-stability": "dev"
> }
> ```

## Quick Start

```php
<?php
require 'vendor/autoload.php';

use Planpoint\PlanpointClient;

// 1. Authenticate
$unauthClient = new PlanpointClient('');
$loginResp = $unauthClient->authentication->login(
    new \Planpoint\Authentication\Requests\LoginBody([
        'username' => 'you@example.com',
        'password' => 'yourpassword',
    ])
);
$token = $loginResp->accessToken;

// 2. Create an authenticated client
$client = new PlanpointClient($token);

// 3. Fetch your projects
$projects = $client->projects->getMyProjects();
foreach ($projects as $project) {
    echo $project->name . "\n";
}
```

## API Reference

### Authentication

#### `$client->authentication->login(LoginBody $request)`

Authenticate and receive a JWT token.

| Field         | Type     | Required | Description              |
| ------------- | -------- | -------- | ------------------------ |
| `username`    | `string` | Yes      | User email               |
| `password`    | `string` | No       | User password            |
| `impersonate` | `bool`   | No       | Impersonate another user |

**Returns:** `LoginResponse` — `->accessToken: string`

---

### Projects

#### `$client->projects->getMyProjects()`

List all projects belonging to the authenticated user. Requires auth.

**Returns:** `ProjectSummary[]` — `->name`, `->namespace`, `->hostName`, `->status`, `->paused`, `->createdAt`

---

#### `$client->projects->findProject(FindProjectRequest $request)`

Find a public project by namespace and hostname. No auth required.

| Field       | Type     | Required | Description       |
| ----------- | -------- | -------- | ----------------- |
| `namespace` | `string` | Yes      | Project namespace |
| `hostName`  | `string` | Yes      | Allowed hostname  |

**Returns:** `Project` — full project with floors, units, settings

---

#### `$client->projects->getProject(string $id)`

Get a project by ID. Requires auth.

| Param | Type     | Required | Description      |
| ----- | -------- | -------- | ---------------- |
| `$id` | `string` | Yes      | Project ObjectId |

**Returns:** `Project`

---

#### `$client->projects->updateProject(string $id, UpdateProjectRequest $request)`

Update project settings. Requires auth.

**Returns:** `Project`

---

### Groups

#### `$client->groups->getGroups()`

List all groups for the authenticated user. Requires auth.

**Returns:** `GroupsListResponse` — `->records: Group[]`, `->count: int`

---

#### `$client->groups->getGroup(string $id)`

Get a group by ID. Requires auth.

**Returns:** `Group` — `->name`, `->namespace`, `->hostName`, `->type`, `->projects`, `->isOwner`, `->isAdmin`, `->isEditor`

---

#### `$client->groups->createGroup(CreateGroupRequest $request)`

Create a new group. Requires auth.

| Field          | Type     | Required | Description   |
| -------------- | -------- | -------- | ------------- |
| `name`         | `string` | Yes      | Group name    |
| `namespace`    | `string` | No       | Namespace     |
| `hostName`     | `string` | No       | Hostname      |
| `type`         | `string` | No       | Group type    |
| `propertyType` | `string` | No       | Property type |

**Returns:** `Group`

---

#### `$client->groups->updateGroup(string $id, UpdateGroupRequest $request)`

Update a group. Requires auth.

**Returns:** `Group`

---

### Floors

#### `$client->floors->getFloors(GetFloorsRequest $request)`

List all floors for a project. Requires auth.

| Field | Type     | Required | Description      |
| ----- | -------- | -------- | ---------------- |
| `pid` | `string` | Yes      | Project ObjectId |

**Returns:** `FloorFull[]` — `->name`, `->project`, `->level`, `->position`, `->path`, `->image`

---

#### `$client->floors->getFloor(string $id)`

Get a floor by ID. Requires auth.

**Returns:** `FloorFull`

---

#### `$client->floors->createFloor(CreateFloorRequest $request)`

Create a new floor. Requires auth.

| Field              | Type       | Required | Description                 |
| ------------------ | ---------- | -------- | --------------------------- |
| `project`          | `array`    | Yes      | `['_id' => '<project_id>']` |
| `name`             | `string`   | Yes      | Floor name                  |
| `position`         | `int`      | No       | Display order               |
| `path`             | `string`   | No       | SVG/image path              |
| `alternativePaths` | `string[]` | No       | Additional paths            |

**Returns:** `FloorFull`

---

#### `$client->floors->updateFloor(string $id, UpdateFloorRequest $request)`

Update a floor. Requires auth.

**Returns:** `FloorFull`

---

### Units

#### `$client->units->getUnits(GetUnitsRequest $request)`

List all units for a project. Requires auth.

| Field | Type     | Required | Description      |
| ----- | -------- | -------- | ---------------- |
| `pid` | `string` | Yes      | Project ObjectId |

**Returns:** `UnitsListResponse` — `->records: UnitFull[]`, `->count: int`

`UnitFull` fields: `->floor`, `->name`, `->unitNumber`, `->status`, `->price`, `->bed`, `->bath`, `->sqft`, `->model`, `->orientation`, `->parking`

`status` values: `Available` | `OnHold` | `Sold` | `Leased` | `Unavailable`

---

#### `$client->units->getUnit(string $id)`

Get a unit by ID. Requires auth.

**Returns:** `UnitFull`

---

#### `$client->units->createUnit(CreateUnitRequest $request)`

Create a new unit. Requires auth.

| Field   | Type    | Required | Description               |
| ------- | ------- | -------- | ------------------------- |
| `floor` | `array` | Yes      | `['_id' => '<floor_id>']` |

**Returns:** `UnitFull`

---

#### `$client->units->updateUnit(string $id, UpdateUnitRequest $request)`

Update a unit. Requires auth.

**Returns:** `UnitFull`

---

#### `$client->units->deleteUnit(string $id)`

Delete a unit. Requires auth.

**Returns:** `array` — `['message' => string]`

---

#### `$client->units->batchUpdateUnits(BatchUpdateUnitsRequest $request)`

Update multiple units at once. Requires auth.

| Field       | Type       | Required | Description              |
| ----------- | ---------- | -------- | ------------------------ |
| `ids`       | `string[]` | Yes      | Unit ObjectIds to update |
| `patchData` | `array`    | Yes      | Fields to apply to all   |

**Returns:** `UnitFull[]`

---

### Leads

#### `$client->leads->getLeads(GetLeadsRequest $request)`

List all leads for a project. Requires auth.

| Field | Type     | Required | Description      |
| ----- | -------- | -------- | ---------------- |
| `pid` | `string` | Yes      | Project ObjectId |

**Returns:** `Lead[]` — `->name`, `->email`, `->phone`, `->message`, `->unit`, `->createdAt`

---

## Links

- [PlanPoint App](https://app.planpoint.io)
- [npm TypeScript SDK](https://www.npmjs.com/package/@planpoint/sdk)
- [PyPI Python SDK](https://pypi.org/project/planpoint-sdk)
