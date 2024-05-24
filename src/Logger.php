<?php

declare(strict_types=1);

namespace Xtompie\Logger;

class Logger
{
    public function __construct(
        protected string $dir,
        protected string $name = 'main',
        protected string $ext = 'log',
    ) {
        $this->dir();
    }

    public function withName(string $name): static
    {
        $new = clone $this;
        $new->name = $name;
        return $new;
    }

    public function __invoke(string $log): void
    {
        file_put_contents(
            "{$this->dir}/{$this->name}-" .date('Y-m-d') . ".{$this->ext}",
            date('Y-m-d H:i:s') . ' ' . $log . "\n",
            FILE_APPEND
        );
    }

    public function data(mixed $data): void
    {
        $this->__invoke(json_encode($data));
    }

    protected function dir(): void
    {
        if (is_dir($this->dir)) {
            return;
        }
        mkdir($this->dir, 0775, true);
    }
}
