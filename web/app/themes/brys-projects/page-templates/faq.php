<?php
/**
 * Template name: Veelgestelde vragen
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'title' => 'Veelgestelde<br>vragen',
	'text'  => 'Antwoorden op de vragen die wij het vaakst krijgen, per onderwerp.',
) ); ?>

<?php get_template_part( 'partials/blocks/faq', null, array(
	'classes' => 'mt-[13rem]',
	'title'   => 'Microcement',
	'items'   => array(
		array(
			'question' => 'Wat kost microcement?',
			'answer'   => 'De prijs hangt af van de oppervlakte, de staat van de ondergrond en de toepassing. Een douche vraagt meer detailwerk dan een open vloer. Na een bezoek ter plaatse krijgt u een vaste prijs voor het hele project.',
		),
		array(
			'question' => 'Kan het over mijn bestaande tegels?',
			'answer'   => 'Meestal wel. De tegels moeten vast liggen en vlak zijn. Wij vullen de voegen op en brengen een wapeningsnet aan. Zo tekenen de voegen later niet door.',
		),
		array(
			'question' => 'Is het geschikt voor een inloopdouche?',
			'answer'   => 'Ja. Wij brengen eerst een waterdichting aan en werken af met een vernis voor natte ruimtes. Hoeken, nissen en afvoeren krijgen extra aandacht. Daar zit het echte vakwerk.',
		),
		array(
			'question' => 'Krijgt microcement barsten?',
			'answer'   => 'Een fijne haarscheur kan ontstaan als het gebouw werkt, bijvoorbeeld door zetting. Daarom controleren wij de ondergrond vooraf en werken wij met een wapeningsnet. Een nieuwe chape moet eerst droog genoeg zijn. Dat meten wij. Is de ondergrond niet stabiel genoeg, dan zeggen wij dat eerlijk.',
		),
		array(
			'question' => 'Hoe onderhoud ik het?',
			'answer'   => 'Met lauw water en een pH-neutrale zeep. Vermijd schuurmiddelen en agressieve producten. Op het keukenblad veegt u zuren zoals citroen of azijn best meteen weg. In zones waar veel gelopen wordt, frissen wij de vernis na enkele jaren op.',
		),
		array(
			'question' => 'Hoe lang duren de werken?',
			'answer'   => 'Microcement wordt in lagen aangebracht en elke laag moet drogen. Een badkamer of vloer duurt meestal één tot twee weken. U krijgt de planning vooraf, bij de offerte.',
		),
		array(
			'question' => 'Wanneer raden wij het af?',
			'answer'   => 'Op een ondergrond die nog werkt of vochtig is. Of als u een volledig egale kleur wilt, zoals bij een gietvloer. Microcement is met de hand gemaakt: nuances in tint en spaanslag horen erbij.',
		),
		array(
			'question' => 'Is microcement hetzelfde als beton ciré of microtopping?',
			'answer'   => 'Het gaat om dezelfde familie van afwerkingen. De namen worden vaak door elkaar gebruikt. De samenstelling verschilt wel per merk en systeem.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'Staat uw vraag<br>er niet bij?',
	'link'    => array( 'label' => 'sales@brys-projects.be', 'url' => 'mailto:sales@brys-projects.be' ),
) ); ?>

<?php get_footer(); ?>
