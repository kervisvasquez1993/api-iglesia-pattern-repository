<?php

namespace App\DTOs\Evento;

use App\Http\Requests\Evento\CreateEventoRequest;
use App\Http\Requests\Evento\UpdateEventoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DTOsEvento
{
    public function __construct(
        private readonly string $nome,
        private readonly ?string $descricao,
        private readonly ?string $imagem,
        private readonly string $data_inicio,
        private readonly ?string $localizacao,
        private readonly string $status,
    ) {}

    public static function fromRequest(CreateEventoRequest $request): self
    {
        $validated = $request->validated();
        $imagePath = self::uploadImageToS3($request);

        return new self(
            nome: $validated['nome'],
            descricao: $validated['descricao'] ?? null,
            imagem: $imagePath,
            data_inicio: $validated['data_inicio'],
            localizacao: $validated['localizacao'] ?? null,
            status: $validated['status'] ?? 'ativo'
        );
    }

    private static function uploadImageToS3(CreateEventoRequest $request): ?string
    {
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = Storage::disk('s3')->putFile('eventos', $file);
            return "https://backend-imagen-br.s3.us-east-2.amazonaws.com/" . $path;
        }
        return $request->input('imagem');
    }

    public static function fromUpdateRequest(UpdateEventoRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            nome: $validated['nome'],
            descricao: $validated['descricao'] ?? null,
            imagem: $validated['imagem'] ?? null,
            data_inicio: $validated['data_inicio'],
            localizacao: $validated['localizacao'] ?? null,
            status: $validated['status'] ?? 'ativo'
        );
    }

    public function toArray(): array
    {
        return [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'imagem' => $this->imagem,
            'data_inicio' => $this->data_inicio,
            'localizacao' => $this->localizacao,
            'status' => $this->status
        ];
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function getDataInicio(): string
    {
        return $this->data_inicio;
    }

    public function getLocalizacao(): ?string
    {
        return $this->localizacao;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    
}
