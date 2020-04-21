<?php

declare(strict_types=1);

namespace Dengue\Entity;

use App\Entity\BaseEntityInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * user_dengue
 *
 * @ORM\Table(name="user_dengue")
 * @ORM\Entity(repositoryClass="Dengue\Repository\UserDengueRepository")
 */
class UserDengue implements BaseEntityInterface
{
    /**
     * @var int
     * @Type("int")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="user_dengue_id_seq", allocationSize=1, initialValue=1)
     * @ORM\Column(name="iduserdengue", type="integer")
     */
    private $iduserdengue;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="nome", type="text")
     * @Assert\NotBlank(message="O campo nome é obrigatório!")
     */
    private $nome;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="email", type="text")
     * @Assert\NotBlank(message="O campo email é obrigatório!")
     */
    private $email;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="senha", type="text")
     * @Assert\NotBlank(message="O campo senha é obrigatório!")
     */
    private $senha;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="cpf", type="text")
     * @Assert\NotBlank(message="O campo cpf é obrigatório!")
     */
    private $cpf;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="rg", type="text")
     * @Assert\NotBlank(message="O campo rg é obrigatório!")
     */
    private $rg;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="estado", type="text")
     * @Assert\NotBlank(message="O campo estado é obrigatório!")
     */
    private $estado;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="cidade", type="text")
     * @Assert\NotBlank(message="O campo cidade é obrigatório!")
     */
    private $cidade;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="bairro", type="text")
     * @Assert\NotBlank(message="O campo bairro é obrigatório!")
     */
    private $bairro;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="endereco", type="text")
     * @Assert\NotBlank(message="O campo endereco é obrigatório!")
     */
    private $endereco;

    /**
     * @var int
     * @Type("int")
     * @ORM\Column(name="telefone", type="integer")
     * @Assert\NotBlank(message="O campo telefone é obrigatório!")
     */
    private $telefone;

    /**
     * Get the value of iduserdengue
     *
     * @return  int
     */
    public function getIduserdengue()
    {
        return $this->iduserdengue;
    }

    /**
     * Set the value of iduserdengue
     *
     * @param  int  $iduserdengue
     *
     * @return  self
     */
    public function setIduserdengue(int $iduserdengue)
    {
        $this->iduserdengue = $iduserdengue;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param  string  $nome
     *
     * @return  self
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     *
     * @return  string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @param  string  $senha
     *
     * @return  self
     */
    public function setSenha(string $senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of cpf
     *
     * @return  string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @param  string  $cpf
     *
     * @return  self
     */
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of rg
     *
     * @return  string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     *
     * @param  string  $rg
     *
     * @return  self
     */
    public function setRg(string $rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get the value of estado
     *
     * @return  string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @param  string  $estado
     *
     * @return  self
     */
    public function setEstado(string $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cidade
     *
     * @return  string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @param  string  $cidade
     *
     * @return  self
     */
    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of bairro
     *
     * @return  string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @param  string  $bairro
     *
     * @return  self
     */
    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of endereco
     *
     * @return  string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @param  string  $endereco
     *
     * @return  self
     */
    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     *
     * @return  int
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @param  int  $telefone
     *
     * @return  self
     */
    public function setTelefone(int $telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
}
