<?php

namespace T3Monitor\T3monitoring\Tests\Unit\Command\Controller;


use T3Monitor\T3monitoring\Command\ReportCommandController;
use T3Monitor\T3monitoring\Notification\EmailNotification;
use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Lang\LanguageService;

class ReportCommandControllerTest extends UnitTestCase
{

    /**
     * @test
     */
    public function reportCommandWillTriggerEmailNotifaction()
    {
        $dummyClients = ['123', '456'];
        $emailAddress = 'fo@bar.com';
        $mockedClientImport = $this->getAccessibleMock(ReportCommandController::class, ['outputLine'], [], '',
            false);

        $emailNotification = $this->prophesize(EmailNotification::class);

        $repository = $this->prophesize(\T3Monitor\T3monitoring\Domain\Repository\ClientRepository::class);
        $repository->getAllForReport()->willReturn($dummyClients);
        $languageService = $this->prophesize(LanguageService::class);
        $mockedClientImport->_set('languageService', $languageService->reveal());
        $mockedClientImport->_set('clientRepository', $repository->reveal());
        $mockedClientImport->_set('emailNotification', $emailNotification->reveal());
        $emailNotification->sendAdminEmail($emailAddress, $dummyClients)->shouldBeCalled();

        $mockedClientImport->_call('adminCommand', 'fo@bar.com');
    }
}
