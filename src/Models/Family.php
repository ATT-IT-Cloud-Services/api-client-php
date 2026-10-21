<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class FamilyGroup extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public ?string $status = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            status: self::nullableString($data, 'status'),
            extra: self::extra($data, ['id', 'name', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class FamilyMember extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $userId,
        public string $role,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            userId: self::string($data, 'userId'),
            role: self::string($data, 'role'),
            extra: self::extra($data, ['id', 'userId', 'role']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'userId' => $this->userId,
            'role' => $this->role,
        ], $this->extra);
    }
}

readonly class FamilyInvite extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $email,
        public string $role,
        public string $status,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            email: self::string($data, 'email'),
            role: self::string($data, 'role'),
            status: self::string($data, 'status'),
            extra: self::extra($data, ['id', 'email', 'role', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
        ], $this->extra);
    }
}

readonly class FamilyGroupResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?FamilyGroup $group = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            group: isset($data['group']) && is_array($data['group'])
                ? FamilyGroup::fromArray($data['group'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->group !== null) {
            $result['group'] = $this->group->toArray();
        }

        return $result;
    }
}

readonly class FamilyMembersResponse extends Model
{
    /** @param list<FamilyMember> $members */
    public function __construct(
        public bool $success,
        public array $members,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $members = [];
        foreach ($data['members'] ?? [] as $item) {
            if (is_array($item)) {
                $members[] = FamilyMember::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            members: $members,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'members' => array_map(static fn (FamilyMember $m): array => $m->toArray(), $this->members),
        ];
    }
}

readonly class FamilyInvitesResponse extends Model
{
    /** @param list<FamilyInvite> $invites */
    public function __construct(
        public bool $success,
        public array $invites,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $invites = [];
        foreach ($data['invites'] ?? [] as $item) {
            if (is_array($item)) {
                $invites[] = FamilyInvite::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            invites: $invites,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'invites' => array_map(static fn (FamilyInvite $i): array => $i->toArray(), $this->invites),
        ];
    }
}

readonly class FamilyBalanceRequest extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public float $amount,
        public string $status,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            amount: self::float($data, 'amount'),
            status: self::string($data, 'status'),
            extra: self::extra($data, ['id', 'amount', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
        ], $this->extra);
    }
}

readonly class FamilyBalanceRequestsResponse extends Model
{
    /** @param list<FamilyBalanceRequest> $requests */
    public function __construct(
        public bool $success,
        public array $requests,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $requests = [];
        foreach ($data['requests'] ?? [] as $item) {
            if (is_array($item)) {
                $requests[] = FamilyBalanceRequest::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            requests: $requests,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'requests' => array_map(static fn (FamilyBalanceRequest $r): array => $r->toArray(), $this->requests),
        ];
    }
}

readonly class CreateFamilyGroupRequest extends Model
{
    public function __construct(
        public string $name,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            name: self::string($data, 'name'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}

readonly class CreateFamilyGroupResponse extends Model
{
    public function __construct(
        public bool $success,
        public mixed $group = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            group: $data['group'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->group !== null) {
            $result['group'] = $this->group;
        }

        return $result;
    }
}

readonly class FamilyInviteRequest extends Model
{
    public function __construct(
        public string $email,
        public string $role,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            email: self::string($data, 'email'),
            role: self::string($data, 'role'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'role' => $this->role,
        ];
    }
}

readonly class FamilyInviteResponse extends Model
{
    public function __construct(
        public bool $success,
        public mixed $invite = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            invite: $data['invite'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->invite !== null) {
            $result['invite'] = $this->invite;
        }

        return $result;
    }
}

readonly class UpdateFamilyMemberRequest extends Model
{
    public function __construct(
        public ?string $role = null,
        public ?string $familyBillingMode = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            role: self::nullableString($data, 'role'),
            familyBillingMode: self::nullableString($data, 'familyBillingMode'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'role' => $this->role,
            'familyBillingMode' => $this->familyBillingMode,
        ], static fn ($v) => $v !== null);
    }
}
