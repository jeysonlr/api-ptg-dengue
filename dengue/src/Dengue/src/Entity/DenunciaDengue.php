<?php

declare(strict_types=1);

namespace Dengue\Entity;

use App\Entity\BaseEntityInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * denuncia_dengue
 *
 * @ORM\Table(name="denuncia_dengue")
 * @ORM\Entity(repositoryClass="Dengue\Repository\DenunciaDengueRepository")
 */
class DenunciaDengue implements BaseEntityInterface
{
    /**
     * @var int
     * @Type("int")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="denuncia_dengue_id_seq", allocationSize=1, initialValue=1)
     * @ORM\Column(name="iddenunciadengue", type="integer")
     */
    private $iddenunciadengue;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="endereco", type="text")
     * @Assert\NotBlank(message="O campo endereco é obrigatório!")
     */
    private $endereco;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="imagem", type="text")
     * @Assert\NotBlank(message="O campo imagem é obrigatório!")
     */
    private $imagem;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="descricao", type="text")
     * @Assert\NotBlank(message="O campo descricao é obrigatório!")
     */
    private $descricao;

    /**
     * Get the value of iddenunciadengue
     *
     * @return  int
     */
    public function getIddenunciadengue()
    {
        return $this->iddenunciadengue;
    }

    /**
     * Set the value of iddenunciadengue
     *
     * @param  int  $iddenunciadengue
     *
     * @return  self
     */
    public function setIddenunciadengue(int $iddenunciadengue)
    {
        $this->iddenunciadengue = $iddenunciadengue;

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
     * Get the value of imagem
     *
     * @return  string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @param  string  $imagem
     *
     * @return  self
     */
    public function setImagem(string $imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of descricao
     *
     * @return  string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @param  string  $descricao
     *
     * @return  self
     */
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}
