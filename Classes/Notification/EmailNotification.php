<?php
namespace T3Monitor\T3monitoring\Notification;

/*
 * This file is part of the t3monitoring extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use UnexpectedValueException;

class EmailNotification
{

    /**
     * @param string $email
     * @param $clients
     * @param string $subject
     */
    public function sendAdminEmail($email, $clients, $subject = 'Monitoring Report')
    {
        if (!GeneralUtility::validEmail($email)) {
            throw new UnexpectedValueException('The email address is not valid');
        }

        if (count($clients) === 0) {
            return;
        }

        $arguments = [
            'email' => $email,
            'clients' => $clients
        ];
        $template = $this->getFluidTemplate($arguments, 'AdminEmail.txt', 'txt');
        $this->sendMail($email, $subject, $template);
    }

    /**
     * @param string $to
     * @param string $subject
     * @param string $plainContent
     * @param string $htmlContent
     * @return int
     */
    protected function sendMail($to, $subject, $plainContent, $htmlContent = '')
    {
        /** @var MailMessage $mailMessage */
        $mailMessage = GeneralUtility::makeInstance(MailMessage::class);
        $mailMessage
            ->setSubject($subject)
            ->addFrom($this->getSenderEmailAddress(), $this->getSenderEmailName())
            ->setTo($to)
            ->setBody($plainContent)->setContentType('text/plain');
        if (!empty($htmlContent)) {
            $mailMessage->addPart($htmlContent, 'text/emailText');
        }
        return $mailMessage->send();
    }

    /**
     * Creates a fluid instance with given template-file
     *
     * @param array $arguments
     * @param string $file Path below Template-Root-Path
     * @param string $format
     * @return string
     */
    protected function getFluidTemplate(array $arguments, $file, $format = 'html')
    {
        /** @var StandaloneView $renderer */
        $renderer = GeneralUtility::makeInstance(StandaloneView::class);
        $renderer->setFormat($format);
        $path = GeneralUtility::getFileAbsFileName('EXT:t3monitoring/Resources/Private/Templates/Notification/' . $file);
        $renderer->setTemplatePathAndFilename($path);
        $renderer->assignMultiple($arguments);

        return trim($renderer->render());
    }

    /**
     * Gets sender name from configuration
     * ['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName']
     * If this setting is empty, it falls back to a default string.
     *
     * @return string
     */
    protected function getSenderEmailName()
    {
        return !empty($GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'])
            ? $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName']
            : 'EXT:t3monitoring';
    }

    protected function getSenderEmailAddress()
    {
        return !empty($GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'])
            ? $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress']
            : 'no-reply@example.com';
    }
}
