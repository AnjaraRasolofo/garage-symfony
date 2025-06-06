<?php

namespace App\Tests\Controller;

use App\Entity\Piece;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PieceControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $pieceRepository;
    private string $path = '/piece/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->pieceRepository = $this->manager->getRepository(Piece::class);

        foreach ($this->pieceRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Piece index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'piece[nom]' => 'Testing',
            'piece[reference]' => 'Testing',
            'piece[quantite]' => 'Testing',
            'piece[prixAchat]' => 'Testing',
            'piece[prixVente]' => 'Testing',
            'piece[description]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->pieceRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Piece();
        $fixture->setNom('My Title');
        $fixture->setReference('My Title');
        $fixture->setQuantite('My Title');
        $fixture->setPrixAchat('My Title');
        $fixture->setPrixVente('My Title');
        $fixture->setDescription('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Piece');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Piece();
        $fixture->setNom('Value');
        $fixture->setReference('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixAchat('Value');
        $fixture->setPrixVente('Value');
        $fixture->setDescription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'piece[nom]' => 'Something New',
            'piece[reference]' => 'Something New',
            'piece[quantite]' => 'Something New',
            'piece[prixAchat]' => 'Something New',
            'piece[prixVente]' => 'Something New',
            'piece[description]' => 'Something New',
        ]);

        self::assertResponseRedirects('/piece/');

        $fixture = $this->pieceRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getQuantite());
        self::assertSame('Something New', $fixture[0]->getPrixAchat());
        self::assertSame('Something New', $fixture[0]->getPrixVente());
        self::assertSame('Something New', $fixture[0]->getDescription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Piece();
        $fixture->setNom('Value');
        $fixture->setReference('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixAchat('Value');
        $fixture->setPrixVente('Value');
        $fixture->setDescription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/piece/');
        self::assertSame(0, $this->pieceRepository->count([]));
    }
}
