<?php

namespace App\Http\Controllers;

use App\Facades\CourseFacade;
use App\Facades\DashboardFacade;
use App\Facades\PackageDefinitionFacade;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;

class PDFController extends Controller
{
    public function businessPdf()
    {
        list($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats) = $this->getData();
        $now = new DateTime();

        $currentMonthYear =  $now->format('m/Y');
        $data = [
            'studentsData' => $studentsData,
            'studentWithPackagesEndingCurrentMonth' => $studentWithPackagesEndingCurrentMonth,
            'studentWithPackagesEndingSoon' => $studentWithPackagesEndingSoon,
            'packageDefinitionStats' => $packageDefinitionStats,
            'courseStats' => $courseStats,
            'currentMonthYear' => $currentMonthYear,
            'currentDate' =>now()
        ];

        $pdf = Pdf::loadView('pdfs/business-info', $data);

        return $pdf->download('sample.pdf');
    }

    public function testPdfView()
    {

        list($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats) = $this->getData();
        $now = new DateTime();

        $currentMonthYear =  $now->format('m/Y');

        $data = [
            'title' => 'Sample PDF',
            'content' => 'This is the content of the PDF file.',
            'studentsData' => $studentsData,
            'studentWithPackagesEndingCurrentMonth' => $studentWithPackagesEndingCurrentMonth,
            'studentWithPackagesEndingSoon' => $studentWithPackagesEndingSoon,
            'packageDefinitionStats' => $packageDefinitionStats,
            'courseStats' => $courseStats,
            'currentMonthYear' => $currentMonthYear,
            'currentDate' =>now()
        ];

        return view('pdfs/business-info', $data);
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        $dashBoardFacade = new DashboardFacade();

        $studentsData = $dashBoardFacade->getStudentsStats();
        $studentWithPackagesEndingCurrentMonth = $dashBoardFacade->getStudentsWithPackagesEndingCurrentMonth();
        $studentWithPackagesEndingSoon = $dashBoardFacade->getStudentsWithPackagesEndingSoon();

        $packageDefinitionFacade = new PackageDefinitionFacade();
        $packageDefinitionStats = $packageDefinitionFacade->getPackageDefinitionStats();

        $courseFacade = new CourseFacade();
        $courseStats = $courseFacade->getAttendancePerCourse();
        return array($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats);
    }
}
