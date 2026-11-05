<?php
namespace OpenDxp\Bundle\QrcodeBundle\\Probe;

use OpenDxp\Db;
use OpenDxp\Model\DataObject\Listing;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProbeController
{
    public function html(Request $request): Response { return new Response((string) $request->query->get('x')); }
    public function obj(Request $request): mixed { return unserialize((string) $request->get('y')); }
    public function redirect(Request $request): RedirectResponse { return new RedirectResponse((string) $request->query->get('to')); }
    public function dbal(Request $request): int { return Db::get()->executeStatement('DELETE FROM t WHERE k = "' . (string) $request->query->get('k') . '"'); }
    public function dbalQuery(Request $request): array { return Db::get()->fetchAllAssociative('SELECT * FROM t WHERE k = "' . (string) $request->query->get('k') . '"'); }
    public function listing(Request $request, Listing $l): void { $l->setCondition('k = "' . (string) $request->query->get('k') . '"'); }
}
