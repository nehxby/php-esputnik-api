<?php

namespace Esputnik\Model;

class EmailMessage extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
	protected $name;

    /**
     * @var string
     */
	protected $from;

    /**
     * @var string
     */
	protected $subject;

    /**
     * @var string
     */
	protected $htmlText;

    /**
     * @var string[]
     */
	protected $tags = [];

    /**
     * EmailMessage constructor.
     * @param string   $name
     * @param string   $from
     * @param string   $subject
     * @param string   $htmlText
     * @param string[] $tags
     */
    public function __construct($name, $from, $subject, $htmlText, array $tags = [])
    {
        $this->name = $name;
        $this->from = $from;
        $this->subject = $subject;
        $this->htmlText = $htmlText;
        $this->tags = $tags;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getHtmlText()
    {
        return $this->htmlText;
    }

    /**
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}
