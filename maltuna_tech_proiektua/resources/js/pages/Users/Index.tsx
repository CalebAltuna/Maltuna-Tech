import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage, router, Link } from '@inertiajs/react';
import {Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow, } from "@/components/ui/table";
import {Button } from "@/components/ui/button";
import { Alert, AlertTitle, AlertDescription } from '@/components/ui/alert';
import { Megaphone } from 'lucide-react';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: 'Users/',
    },
];

interface User {
    id: number;
    name: string;
    email: string;

}

interface PageProps {
    flash:{
        message?:string
    }
    users:User[],
}

export default function Index() {
    const {flash,users} = usePage().props as PageProps;
    const {processing, delete: destroy} = useForm();

    const handleDelete = (id:number, email:string) => {
        if(confirm('Do you want to delete - '+ id + '. '+ email)){
            destroy('users/' + id);
        }
    }



    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Users" />
             <div>
                <Link href='/users/register'>
                    <Button className='m-4 bg-blue-500 hover:bg-blue-700'>Create New User</Button>
                </Link>
            </div>
            <div className='m-4'>
                {flash?.message && (
                    <Alert>
                        <Megaphone className='h-4 w-4'></Megaphone>
                        <AlertTitle>Notification!</AlertTitle>
                        <AlertDescription>{flash.message}</AlertDescription>
                    </Alert>
                )}
            </div>

            <Table>
                <TableCaption> A list of your recent users.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">ID</TableHead>
                        <TableHead>Name</TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead className="text-right">Action</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    {users.map((user) => (
                    <TableRow>
                        <TableCell>{user.id}</TableCell>
                        <TableCell>{user.name}</TableCell>
                        <TableCell>{user.email}</TableCell>
                        <TableCell>
                            <Button disabled={processing} onClick={()=> handleDelete(user.id, user.email)} className='bg-red-500 hover:bg-red-700' > Delete </Button>
                        </TableCell>
                    </TableRow>
                    ))}
                </TableBody>
            </Table>


        </AppLayout>
    );
}



