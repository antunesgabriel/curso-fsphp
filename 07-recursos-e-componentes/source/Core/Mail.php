<?php

namespace Source\Core;

use stdClass;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;
use PHPMailer\PHPMailer\SMTP;

use Source\Core\Message;

class Mail
{
    /** @var PHPMailer $mail */
    private $mail;

    /** @var Message $message */
    private $message;

    /** @var object $data */
    private $data;

    public function __construct()
    {
        $this->mail = new PHPMailer(CONF_MAIL_EXCEPTION);
        $this->message = new Message();

        if (CONF_MAIL_ISSMTP) $this->mail->isSMTP();

        $this->mail->setLanguage(CONF_MAIL_LANGUAGE);
        $this->mail->SMTPAuth = CONF_MAIL_AUTH;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->CharSet = CONF_MAIL_CHARSET;
        $this->mail->isHTML(CONF_MAIL_ISHTML);

        $this->mail->Host = CONF_MAIL_HOST;
        $this->mail->Port = CONF_MAIL_PORT;
        $this->mail->Username = CONF_MAIL_USERNAME;
        $this->mail->Password = CONF_MAIL_PASSWORD;
    }

    /**
     * Inicar um novo email
     * @param string $subject Assunto do email
     * @param string $body Corpo do email
     * @return Mail
     */
    public function bootstrap(string $subject, string $body): Mail
    {
        $this->data = new stdClass();
        $this->data->subject = filter_var($subject, FILTER_SANITIZE_STRIPPED);
        $this->data->body = $body;
        $this->data->attachment = [];

        return $this;
    }

    /**
     * Adcionar anexo ao email
     * @param string $path Caminho do anexo
     * @param string $name Nome do anexo
     * @return null|Mail
     */
    public function setAttachment(string $path, string $name): ?Mail
    {
        if (empty($this->data)) {
            $this->message->warning('Você deve inciar o método bootstrap antes de chamar: ' . __FUNCTION__);
            return null;
        }

        $this->data->attachment[$path] = $name;

        return $this;
    }

    /**
     * Fazer o envio do email
     * @param string $recipientMail Endereço de email do destinatario
     * @param string $recipientName Nome do destinatario
     * @param string $senderMail Endereço de email do rementente
     * @param string $senderName Nome do remetente
     * @return bool True se foi concluido o envio ou False se deu algum erro
     */
    public function send(
        string $recipientMail,
        string $recipientName,
        string $senderMail = CONF_MAIL_SENDER['address'],
        string $senderName = CONF_MAIL_SENDER['name']
    ): bool {
        try {
            if (empty($this->data)) {
                $this->message->warning('Você deve iniciar o corpo do email antes no método bootstrap');
                return false;
            }

            if (!is_email($recipientMail)) {
                $this->message->warning(
                    'Por favor defina um endereço de email do destinatário valído'
                );
                return false;
            }

            if (!is_email($senderMail)) {
                $this->message->warning(
                    'Por favor defina um endereço de email de remetente valído'
                );
                return false;
            }

            $this->mail->Body = $this->data->body;
            $this->mail->Subject = $this->data->subject;
            $this->mail->addAddress($recipientMail, $recipientName);
            $this->mail->setFrom($senderMail, $senderName);

            if (!empty($this->data->attachment)) {
                foreach ($this->data->attachment as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();

            return true;
        } catch (MailException $exception) {
            $this->message->error($exception->getMessage());
            return false;
        }
    }

    /**
     * Get the value of mail
     * @return PHPMailer
     */
    public function getMail(): PHPMailer
    {
        return $this->mail;
    }

    /**
     * Get the value of message
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }
}