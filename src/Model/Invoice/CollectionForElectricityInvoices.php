<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CollectionForElectricityInvoices implements CreatableFromArray
{
    /**
     * @var int
     */
    private $kommunkod;

    /**
     * @var bool
     */
    private $naringsidkare;

    /**
     * @var bool
     */
    private $avflyttad;

    /**
     * var string $avflyttadDatum.
     */
    private $avflyttadDatum;

    /**
     * @var bool
     */
    private $frankopplad;

    /**
     * @var string
     */
    private $frankoppladDatum;

    /**
     * @var string
     */
    private $anladr;

    /**
     * @var string
     */
    private $natom;

    /**
     * @var int
     */
    private $arsforb;

    /**
     * @var string
     */
    private $anlid;

    /**
     * @var string
     */
    private $kravmall;

    /**
     * @var string
     */
    private $plombkod;

    /**
     * @var bool
     */
    private $slutfaktura;

    /**
     * @return int
     */
    public function getKommunkod(): int
    {
        return $this->kommunkod;
    }

    /**
     * @param int $kommunkod
     *
     * @return CollectionForElectricityInvoices
     */
    public function withKommunkod(int $kommunkod)
    {
        $new = clone $this;
        $new->kommunkod = $kommunkod;

        return $new;
    }

    /**
     * @return bool
     */
    public function isNaringsidkare(): bool
    {
        return $this->naringsidkare;
    }

    /**
     * @param bool $naringsidkare
     *
     * @return CollectionForElectricityInvoices
     */
    public function withNaringsidkare(bool $naringsidkare)
    {
        $new = clone $this;
        $new->naringsidkare = $naringsidkare;

        return $new;
    }

    /**
     * @return bool
     */
    public function isAvflyttad(): bool
    {
        return $this->avflyttad;
    }

    /**
     * @param bool $avflyttad
     *
     * @return CollectionForElectricityInvoices
     */
    public function withAvflyttad(bool $avflyttad)
    {
        $new = clone $this;
        $new->avflyttad = $avflyttad;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getAvflyttadDatum()
    {
        return $this->avflyttadDatum;
    }

    /**
     * @param mixed $avflyttadDatum
     *
     * @return CollectionForElectricityInvoices
     */
    public function withAvflyttadDatum($avflyttadDatum)
    {
        $new = clone $this;
        $new->avflyttadDatum = $avflyttadDatum;

        return $new;
    }

    /**
     * @return bool
     */
    public function isFrankopplad(): bool
    {
        return $this->frankopplad;
    }

    /**
     * @param bool $frankopplad
     *
     * @return CollectionForElectricityInvoices
     */
    public function withFrankopplad(bool $frankopplad)
    {
        $new = clone $this;
        $new->frankopplad = $frankopplad;

        return $new;
    }

    /**
     * @return string
     */
    public function getFrankoppladDatum(): string
    {
        return $this->frankoppladDatum;
    }

    /**
     * @param string $frankoppladDatum
     *
     * @return CollectionForElectricityInvoices
     */
    public function withFrankoppladDatum(string $frankoppladDatum)
    {
        $new = clone $this;
        $new->frankoppladDatum = $frankoppladDatum;

        return $new;
    }

    /**
     * @return string
     */
    public function getAnladr(): string
    {
        return $this->anladr;
    }

    /**
     * @param string $anladr
     *
     * @return CollectionForElectricityInvoices
     */
    public function withAnladr(string $anladr)
    {
        $new = clone $this;
        $new->anladr = $anladr;

        return $new;
    }

    /**
     * @return string
     */
    public function getNatom(): string
    {
        return $this->natom;
    }

    /**
     * @param string $natom
     *
     * @return CollectionForElectricityInvoices
     */
    public function withNatom(string $natom)
    {
        $new = clone $this;
        $new->natom = $natom;

        return $new;
    }

    /**
     * @return int
     */
    public function getArsforb(): int
    {
        return $this->arsforb;
    }

    /**
     * @param int $arsforb
     *
     * @return CollectionForElectricityInvoices
     */
    public function withArsforb(int $arsforb)
    {
        $new = clone $this;
        $new->arsforb = $arsforb;

        return $new;
    }

    /**
     * @return string
     */
    public function getAnlid(): string
    {
        return $this->anlid;
    }

    /**
     * @param string $anlid
     *
     * @return CollectionForElectricityInvoices
     */
    public function withAnlid(string $anlid)
    {
        $new = clone $this;
        $new->anlid = $anlid;

        return $new;
    }

    /**
     * @return string
     */
    public function getKravmall(): string
    {
        return $this->kravmall;
    }

    /**
     * @param string $kravmall
     *
     * @return CollectionForElectricityInvoices
     */
    public function withKravmall(string $kravmall)
    {
        $new = clone $this;
        $new->kravmall = $kravmall;

        return $new;
    }

    /**
     * @return string
     */
    public function getPlombkod(): string
    {
        return $this->plombkod;
    }

    /**
     * @param string $plombkod
     *
     * @return CollectionForElectricityInvoices
     */
    public function withPlombkod(string $plombkod)
    {
        $new = clone $this;
        $new->plombkod = $plombkod;

        return $new;
    }

    /**
     * @return bool
     */
    public function isSlutfaktura(): bool
    {
        return $this->slutfaktura;
    }

    /**
     * @param bool $slutfaktura
     *
     * @return CollectionForElectricityInvoices
     */
    public function withSlutfaktura(bool $slutfaktura)
    {
        $new = clone $this;
        $new->slutfaktura = $slutfaktura;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->kommunkod !== null) {
            $data['kommunkod'] = $this->kommunkod;
        }
        if ($this->naringsidkare !== null) {
            $data['naringsidkare'] = $this->naringsidkare;
        }
        if ($this->avflyttad !== null) {
            $data['avflyttad'] = $this->avflyttad;
        }
        if ($this->avflyttadDatum !== null) {
            $data['avflyttad_datum'] = $this->avflyttadDatum;
        }
        if ($this->frankopplad !== null) {
            $data['frankopplad'] = $this->frankopplad;
        }
        if ($this->frankoppladDatum !== null) {
            $data['frankopplad_datum'] = $this->frankoppladDatum;
        }
        if ($this->anladr !== null) {
            $data['anladr'] = $this->anladr;
        }
        if ($this->natom !== null) {
            $data['natom'] = $this->natom;
        }
        if ($this->arsforb !== null) {
            $data['arsforb'] = $this->arsforb;
        }
        if ($this->anlid !== null) {
            $data['anlid'] = $this->anlid;
        }
        if ($this->kravmall !== null) {
            $data['kravmall'] = $this->kravmall;
        }
        if ($this->plombkod !== null) {
            $data['plombkod'] = $this->plombkod;
        }
        if ($this->slutfaktura !== null) {
            $data['slutfaktura'] = $this->slutfaktura;
        }

        return $data;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return self
     */
    public static function createFromArray(array $data)
    {
        $collection = new self();
        $collection->kommunkod = $data['kommunkod'] ?? null;
        $collection->naringsidkare = $data['naringsidkare'] ?? null;
        $collection->avflyttad = $data['avflyttad'] ?? null;
        $collection->avflyttadDatum = $data['avflyttad_datum'] ?? null;
        $collection->frankopplad = $data['frankopplad'] ?? null;
        $collection->frankoppladDatum = $data['frankopplad_datum'] ?? null;
        $collection->anladr = $data['anladr'] ?? null;
        $collection->natom = $data['natom'] ?? null;
        $collection->arsforb = $data['arsforb'] ?? null;
        $collection->anlid = $data['anlid'] ?? null;
        $collection->kravmall = $data['kravmall'] ?? null;
        $collection->plombkod = $data['plombkod'] ?? null;
        $collection->slutfaktura = $data['slutfaktura'] ?? null;

        return $collection;
    }
}
