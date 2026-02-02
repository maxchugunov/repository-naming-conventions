markdown

# Repository Naming Conventions

This repository defines the naming standards for Repository interfaces. These rules ensure a consistent, expressive, and predictable Data Access Layer (DAL).

## Core Principles

### 1. Retrieval Strategy: `get` vs `find`
We strictly distinguish between "mandatory" and "optional" data retrieval:

*   **`get...`**: Use when the entity **must** exist. If not found, the method **must throw an exception** (e.g., `UserGetException`).
*   **`find...`**: Use for optional lookups. If not found, the method returns `null` or an empty `array`.

### 2. Collection Handling (`Many` and `All`)
*   **`Many`**: Used when retrieving a specific subset (usually by a list of IDs).
*   **`All`**: Used to retrieve all records without filtering.

### 3. Specification Pattern (`BySpec`)
For complex or dynamic filtering, use the **Specification** pattern to keep the interface clean.

### 4. Data Mutation (`add`, `update`, `remove`)
Avoid generic CRUD terms like `create` or `delete`. Use collection-oriented terminology:
*   **`add`**: For new entities.
*   **`update`**: For existing entities.
*   **`remove`**: For deleting entities.

---

## Complete Interface Example

Here is a full implementation of these conventions:

```php
interface UserRepositoryInterface
{
    /** @throws UserGetException */
    public function get(string $id): User;

    /** @throws UserGetException */
    public function getMany(array $ids): array;

    /**
     * @throws UserGetException
     * @return User[]
     */
    public function getBySpec(Spec $spec): array;

    public function find(int $id): ?User;

    /** @return User[] */
    public function findMany(array $ids): array;

    public function findBySpec(Spec $spec): array;

    /** @return User[] */
    public function findAll(): array;

    /** @throws UserAddException */
    public function add(User $user): void;

    /** @param $users User[] */
    public function addMany(array $users): void;

    /** @throws UserUpdateException */
    public function update(User $user): void;

    /**
     * @param $users User[]
     * @throws UserUpdateException
     */
    public function updateMany(array $users): void;

    public function remove(int $id): void;

    public function removeMany(array $ids): void;

    public function removeBySpec(Spec $spec): void;

    public function removeAll(): void;

    /** @throws UserGetException */
    public function getByName(string $name): User;
}